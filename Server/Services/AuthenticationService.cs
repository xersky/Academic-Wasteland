using System.Dynamic;
using LdapProj.Ldap.Services;
using LdapProj.Shared;
using LdapProj.Ldap.Config;
using System.Collections.Generic;
using System.Collections.ObjectModel;
using System.Security.Principal;
using Microsoft.Extensions.Options;
using System.Text;
using Microsoft.Extensions.Logging;
using System;

namespace LdapProj.Server.Services
{
    public class AuthenticationService : IAuthenticationService
    {
        private readonly LdapAuthenticationService _authenticationService;
        private readonly ILogger<AuthenticationService> _logger;
        private Dictionary<AppUser, AccessToken> _users;
        public AuthenticationService(IOptions<LdapConfig> config, ILogger<AuthenticationService> logger)
        {
            _authenticationService = new LdapAuthenticationService(config);
            _logger = logger; 
        }
        public AccessToken Login(Credentials obj) {
            _logger.LogInformation("{0}", obj);
            if(_users == null)
                _users = new Dictionary<AppUser, AccessToken>();
            try
            {
                var user = _authenticationService.Login(obj.Username, obj.Password);
                if (user != null)
                {
                    _users[user] = _users[user] ?? new AccessToken
                    {
                        Token = Convert.ToBase64String(Encoding.ASCII.GetBytes($"{user.Username}:{user.Role}")),
                        Role = user.Role,
                        Expiration = DateTime.Now.AddMinutes(30)
                    };
                    return _users[user];
                }    
            }
            catch {
                _logger.LogInformation("failed");
            }
            return new AccessToken{
                Token = "",
                Role = Role.None,
                Expiration = DateTime.Now
            };
        }
    }
}