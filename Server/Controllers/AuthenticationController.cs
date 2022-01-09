using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using Microsoft.AspNetCore.Mvc;
using Microsoft.Extensions.Logging;
using LdapProj.Shared;
using LdapProj.Server.Services;

namespace LdapProj.Server.Controllers
{

    // this controller does the http handling
    [ApiController]
    [Route("[controller]")]
    public class AuthenticationController : ControllerBase
    {
        private readonly ILogger<AuthenticationController> _logger;
        private readonly IAuthenticationService _authenticationService;

        public AuthenticationController(ILogger<AuthenticationController> logger, IAuthenticationService authenticationService)
        {
            _logger = logger;
            _authenticationService = authenticationService;
        }

        [HttpPost("Login")]
        public AccessToken Login([FromBody] Credentials login)
        {
            return _authenticationService.Login(login);
        }
    }
}
