using System;
using System.ComponentModel.DataAnnotations;
using System.Collections.Generic;
using System.Text;

namespace LdapProj.Shared
{
    [Flags]
    public enum Role {
        Admin, Student, Teacher, Staff, None
    }

    public record AccessToken {
        public string Token { get; set; }
        public Role Role { get; set; }
        public DateTime Expiration { get; set; }
    }

    public record AppUser
    {
        public string DisplayName { get; set; }
        public string Username { get; set; }
        public Role Role { get; set; }
        public string Password { get; set; }
    }

    public record Credentials
    {
        [Required]
        [EmailAddress]
        public string Username { get; set; }
        [Required]
        [StringLength(30, ErrorMessage = "Password must be at least 8 characters long.", MinimumLength = 8)]
        public string Password { get; set; }
    }
}
