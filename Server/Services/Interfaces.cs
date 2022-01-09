using LdapProj.Shared;

namespace LdapProj.Server.Services
{
    public interface IAuthenticationService
    {
        AccessToken Login(Credentials obj);
    }
}