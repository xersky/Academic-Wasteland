using System;
using System.Threading.Tasks;
using System.IO;
using Microsoft.Extensions.Logging;
using System.Collections.Generic;
using Client2.Models;
using System.Linq;
using Client2.Extensions;
namespace Client2.Services
{
    public class Authenficator : IAuthentificator {
        public readonly IDbLayer _dbService;
        public readonly ILocalStorage _localStorage;
        public Authenficator(IDbLayer dbService, ILocalStorage localStorage) {
            _dbService = dbService; _localStorage  = localStorage;
        }
        public async Task<UserT> Login(string email, string password){
            var u =  _dbService.GetUAll().Where(u => u.email == email && u.password == password).FirstOrDefault();
            if(u is not null) 
                await _localStorage.SaveAsync("user", u);
            return u;
        }
        public async Task Logout(){
            if(await IsLoggedIn()){
                await _localStorage.DeleteAsync("user");
            }
        }
        public async Task<bool> IsLoggedIn(){
            var u = await _localStorage.FetchAsync<UserT>("user");
            return u is not null ? true : false;
        }

        public void Register(UserT user){
            _dbService.Add(user);
        }
    }
}