using System.Dynamic;
using LdapProj.Shared;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System;

namespace LdapProj.Server.Services
{
    public class AuthenticationTest : IAuthenticationService
    {
        private readonly List<AppUser> _users = new List<AppUser>(){
            new AppUser{
                DisplayName = "Moustapha.Stitou@admin.ensa.ma",
                Password = "admin12345",
                Role = Role.Admin
            },
            new AppUser{
                DisplayName = "Ayman.Bouchareb@etu.ensa.ma",
                Password = "student12345",
                Role = Role.Student
            },
            new AppUser{
                DisplayName = "Zineb.Besri@prof.ensa.ma",
                Password = "teacher12345",
                Role = Role.Teacher
            },
            new AppUser{
                DisplayName = "John.Doe@direct.ensa.ma",
                Password = "staff12345",
                Role = Role.Staff
            }
        };
        public AuthenticationTest(){}
        public AccessToken Login(Credentials obj)
        {
            var user = _users.Where(u => u.DisplayName == obj.Username).FirstOrDefault();
            if (user is not null && user.Password == obj.Password)
            {
                var token = new AccessToken
                {
                    Token = Guid.NewGuid().ToString(),
                    Role = user.Role,
                    Expiration = DateTime.Now.AddMinutes(30)
                };
                return token;
            }
            return new AccessToken
            {
                Token = "",
                Role = Role.None,
                Expiration = DateTime.Now
            };
        }
    }
}