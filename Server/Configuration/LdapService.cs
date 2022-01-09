using System;
using LdapProj.Shared;
using LdapProj.Ldap.Config;
using Microsoft.Extensions.Options;
using Novell.Directory.Ldap;
using Novell.Directory.Ldap.Utilclass;
using System.Collections.Generic;
using System.Linq;

namespace LdapProj.Ldap.Services
{

    // this service does the authentication Part
    public class LdapAuthenticationService
    {
        private const string MemberOfAttribute = "memberOf";
        private const string DisplayNameAttribute = "displayName";
        private const string SAMAccountNameAttribute = "sAMAccountName";
        //ldap init configs
        private readonly LdapConfig _config;
        //ldap connectionSocket
        private readonly LdapConnection _connection;

        //Constructor Injecting Config via DI
        public LdapAuthenticationService(IOptions<LdapConfig> config)
        {
            _config = config.Value;
            _connection = new LdapConnection
            {
                SecureSocketLayer = true
            };
        }

        //Login Function getting credentials and returning a user object
        public AppUser Login(string username, string password)
        {
            //connection binding 
            _connection.Connect(_config.Url, LdapConnection.DefaultSslPort);
            _connection.Bind(_config.BindDn, _config.BindCredentials);

            //setup of search filter by Users
            var searchFilter = string.Format(_config.SearchFilter, username);
            //Running the search with sub-tree scope 
            var result = _connection.Search(
                _config.SearchBase,
                LdapConnection.ScopeSub,
                searchFilter,
                new[] { MemberOfAttribute, DisplayNameAttribute, SAMAccountNameAttribute },
                false
            );

            try
            {
                //getting the first user that matches the filter 
                var user = result.Next();
                if (user != null)
                {
                    //casting the dynaic type into the AppUser static type 
                    var castedUser = new AppUser
                    {
                        // we get the display name from the user's entry
                        DisplayName = user.GetAttribute(DisplayNameAttribute).StringValue,
                        // we get the SamAccount Attribute from the user's DN
                        Username = user.GetAttribute(SAMAccountNameAttribute).StringValue,
                        Password = user.GetAttribute("userPassword").StringValue,
                        // we loop over memberships and parse them and return the combined role Flag
                        Role = user.GetAttribute(MemberOfAttribute).StringValueArray
                            .Select(s => s.Split(',')[0].Split('=')[1].Trim())
                            .Select(x => Enum.Parse<Role>(x)).Aggregate(Role.None, (x, y) => x | y)
                    };
                    // checking if the password argument matches the User's password
                    if(castedUser.Password == password)
                    {
                        return castedUser;
                    }
                }
            }
            catch
            {
                throw new Exception("Login failed.");
            }
            //closing connection bind
            _connection.Disconnect();
            return null;
        }


    }
}