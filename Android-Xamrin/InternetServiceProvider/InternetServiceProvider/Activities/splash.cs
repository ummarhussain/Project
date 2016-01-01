
using Android.App;
using Android.Content;
using Android.Content.PM;
using Android.OS;
using System.Threading;

namespace InternetServiceProvider.Activities
{
	[Activity(Label = "ISP",MainLauncher = true, Icon = "@drawable/Icon" , Theme="@style/Theme.Splash")]
    public class splash : Activity
    {
        protected override void OnCreate(Bundle savedInstanceState)
        {
            base.OnCreate(savedInstanceState);
           

            Thread.Sleep(2000);
            StartActivity(new Intent(this,typeof(Login)));
            // Create your application here
        }
    }
}