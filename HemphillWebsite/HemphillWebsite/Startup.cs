using Microsoft.Owin;
using Owin;

[assembly: OwinStartupAttribute(typeof(HemphillWebsite.Startup))]
namespace HemphillWebsite
{
    public partial class Startup
    {
        public void Configuration(IAppBuilder app)
        {
            ConfigureAuth(app);
        }
    }
}
