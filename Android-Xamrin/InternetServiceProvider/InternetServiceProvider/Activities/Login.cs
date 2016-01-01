using System;
using System.Text;

using Android.App;
using Android.Content;
using Android.OS;
using Android.Views;
using Android.Widget;
using Android.Views.InputMethods;
using System.Net;
using System.Collections.Specialized;

namespace InternetServiceProvider.Activities
{
    [Activity(Label = "Login" ,MainLauncher = false,Icon = "@drawable/Icon")]
    public class Login : Activity
    {
        RelativeLayout mRelativeLayout;
        private Button mbtnSignup;
        private EditText user;
        private EditText pas;
        private ProgressBar progressbar;

        protected override void OnCreate(Bundle savedInstanceState)
        {
            base.OnCreate(savedInstanceState);
            mRelativeLayout = FindViewById<RelativeLayout>(Resource.Id.mainView);
            // Set our view from the "main" layout resource
            SetContentView(Resource.Layout.login);
            //database created



            // Get our button from the layout resource,
            // and attach an event to it
            mbtnSignup = FindViewById<Button>(Resource.Id.btnLogin);
            progressbar = FindViewById<ProgressBar>(Resource.Id.progressBar144);
            user = FindViewById<EditText>(Resource.Id.txtUserName);
            pas = FindViewById<EditText>(Resource.Id.txtPassword);


            mbtnSignup.Click += mbtnSignup_click;



            // Create your application here
        }

        private void mbtnSignup_click(object sender, EventArgs e)
        {
            try
            {
                RunOnUiThread(() => { progressbar.Visibility = ViewStates.Visible; });

                WebClient client = new WebClient();
                Uri uri = new Uri("http://isp.kashmirbroadband.net/android/login.php");
                NameValueCollection parameters = new NameValueCollection();
                parameters.Add("username", user.Text);
                parameters.Add("password", pas.Text);


                client.UploadValuesCompleted += uploadcomlogin;
                client.UploadValuesAsync(uri, parameters);



            }
            catch (Exception ex)

            {
				progressbar.Visibility = ViewStates.Invisible;
				Toast.MakeText(this, "Something Went Wrong!", ToastLength.Short).Show();
            }
        }

        private void uploadcomlogin(object sender, UploadValuesCompletedEventArgs e)
        {
            RunOnUiThread(() => {
				try{
                string user1 = Encoding.UTF8.GetString(e.Result);

                string lgn = "No Such User Found";

                if (user1 == lgn)
                {
                    AlertDialog.Builder builder = new AlertDialog.Builder(this);
                    builder.SetTitle("Warning!");
                    builder.SetMessage("Incorrect,  Username Or Password");
                    builder.SetPositiveButton("OK", (s, ev) => { });
                    builder.Show();
                }
                else
                {
					Intent i=new Intent(this, typeof(Admin));
					i.PutExtra("username",user.Text);
					StartActivity(i);

                }


                progressbar.Visibility = ViewStates.Invisible;



				}catch (Exception ex)
				{
					progressbar.Visibility = ViewStates.Invisible;
					Toast.MakeText(this, "Something Went Wrong!", ToastLength.Short).Show();
				}
            });
        }

        void mRelativeLayout_Click(object sender, EventArgs e)
        {
            InputMethodManager inputManager = (InputMethodManager)this.GetSystemService(Activity.InputMethodService);
            inputManager.HideSoftInputFromWindow(this.CurrentFocus.WindowToken, HideSoftInputFlags.None);
        }
    }
}