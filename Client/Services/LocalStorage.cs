using System.Threading.Tasks;
using Microsoft.JSInterop;
using System.Text.Json;

namespace LdapProj.Client.Services
{
    public interface ILocalStorage
    {
        Task SaveAsync<T>(string name, T item) where T : class;
        Task DeleteAsync(string name);
        Task<T> FetchAsync<T>(string name) where T : class;
    }

    public class LocalStorage : ILocalStorage
    {
        private readonly IJSRuntime jsRuntime;
        public LocalStorage(IJSRuntime js) => jsRuntime = js;
        public async Task SaveAsync<T>(string name, T item) where T : class
        {
            var data = JsonSerializer.Serialize<T>(item);
            await jsRuntime.InvokeVoidAsync("localStorage.setItem", name, data);
        }
        public async Task DeleteAsync(string name)
        {
            await jsRuntime.InvokeAsync<string>("localStorage.removeItem", name);
        }
        public async Task<T> FetchAsync<T>(string name) where T : class
        {
            var data = await jsRuntime.InvokeAsync<string>("localStorage.getItem", name);
            if(data is not null)
                return JsonSerializer.Deserialize<T>(data);
            else return null;
        }
    }
}