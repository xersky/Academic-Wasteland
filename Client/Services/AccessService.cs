using System;
using System.Threading.Tasks;
using System.Net.Http;
using System.Net.Http.Json;
using Microsoft.AspNetCore.Components;
using LdapProj.Shared;
using Token = LdapProj.Shared.AccessToken;

namespace LdapProj.Client.Services
{
    public interface ILoginService
    {
        Task<Token> Resume();
        Task<Token> Login(Credentials r);
        Task Logout(string token);
    }

    public class LoginService : ILoginService
    {
        private ILocalStorage _localStorage;
        private HttpClient Http ;
        public LoginService(ILocalStorage local, HttpClient httpClient){
            _localStorage = local;
            Http = httpClient;
        }

        public async Task<Token?> Resume()
            => (await _localStorage.FetchAsync<Token>("accessToken")) ?? new Token {
                    Token = "",
                    Role = Role.None,
                    Expiration = DateTime.Now
                };

        public async Task<Token> Login(Credentials request){
            var response = await Http.PostAsJsonAsync<Credentials>("https://LocalHost:5001/Authentication/Login", request);
            var newToken = await response.Content.ReadFromJsonAsync<Token>();
            System.Console.WriteLine(newToken);
            if(newToken is not null){
                await _localStorage.SaveAsync("accessToken", newToken);
            }
            return newToken;
        }

        public async Task Logout(string _){
            await _localStorage.DeleteAsync("accessToken");
        }
    }
}