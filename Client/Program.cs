using Microsoft.AspNetCore.Components.WebAssembly.Hosting;
using Microsoft.Extensions.Configuration;
using Microsoft.Extensions.DependencyInjection;
using Microsoft.Extensions.Logging;
using System;
using System.Collections.Generic;
using System.Net.Http;
using System.Text;
using System.Threading.Tasks;
using MudBlazor.Services;
using Client2.Services;
using Client2.Models;

namespace Client2
{
    public class Program
    {
        public static async Task Main(string[] args)
        {
            var builder = WebAssemblyHostBuilder.CreateDefault(args);
            builder.RootComponents.Add<App>("#app");

            builder.Services.AddScoped(sp => new HttpClient { BaseAddress = new Uri(builder.HostEnvironment.BaseAddress) });
            builder.Services.AddSingleton<IDbLayer, DbService>();
            builder.Services.AddSingleton<IAuthentificator, Authenficator>();
            builder.Services.AddSingleton<ISnapshot, Snapshot>();
            builder.Services.AddSingleton<ILocalStorage, LocalStorage >();
            builder.Services.AddMudServices();

            await builder.Build().RunAsync();
        }
    }
}
