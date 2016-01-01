using System;

using Android.App;
using Android.Content;
using Android.OS;
using Android.Widget;
using System.Net;
using System.Collections.Specialized;

namespace InternetServiceProvider.Activities
{
    [Activity(Label = "insertmanager")]
    public class insertmanager : Activity
    {
        private Button insert;
        private EditText user;
        private EditText pas;
        private EditText name;
        private EditText number;
        private Spinner admin;
        private Spinner city;
        string ad;
        string code;
        protected override void OnCreate(Bundle savedInstanceState)
        {
            base.OnCreate(savedInstanceState);
            SetContentView(Resource.Layout.insertmgr);
            insert= FindViewById<Button>(Resource.Id.btninsert);
           
            user = FindViewById<EditText>(Resource.Id.txtuser);
            pas = FindViewById<EditText>(Resource.Id.txtpas);
            name = FindViewById<EditText>(Resource.Id.txtname);
            number = FindViewById<EditText>(Resource.Id.txtph);
            admin = FindViewById<Spinner>(Resource.Id.txtadmin);
            city = FindViewById<Spinner>(Resource.Id.txtcitycode);
            var city1 = new string[] { "051", "052", "0992", "0996" };
            var mmuser = new string[] { "ummar","salman" };
            city.Adapter = new ArrayAdapter<string>(this, Android.Resource.Layout.SimpleSpinnerDropDownItem, city1);
            city.ItemSelected += new EventHandler<AdapterView.ItemSelectedEventArgs>(item_selected);

            admin.Adapter = new ArrayAdapter<string>(this, Android.Resource.Layout.SimpleSpinnerDropDownItem, mmuser);
            admin.ItemSelected += new EventHandler<AdapterView.ItemSelectedEventArgs>(item_selected1);

            // Create your application here
            insert.Click += Insertmgr;
        }

        private void item_selected1(object sender, AdapterView.ItemSelectedEventArgs e)
        {
            Spinner spinner = (Spinner)sender;
            ad = string.Format("{0}", spinner.GetItemAtPosition(e.Position));
           
        }

        private void item_selected(object sender, AdapterView.ItemSelectedEventArgs e)
        {
            Spinner spinner = (Spinner)sender;
            code = string.Format("{0}", spinner.GetItemAtPosition(e.Position));
          
        }

        private void Insertmgr(object sender, EventArgs e)
        {
            try
            {
                if (user.Text == "")
                {
                    Toast.MakeText(this, "Username field cannot be empty", ToastLength.Long).Show();
                    return;
                }
                else
                 
               if (pas.Text == "")
                {
                    Toast.MakeText(this, "Password field cannot be empty", ToastLength.Long).Show();
                    return;
                }
                else
                if (name.Text == "")
                {
                    Toast.MakeText(this, "Name field cannot be empty", ToastLength.Long).Show();
                    return;
                }
               
                else
                if (number.Text == "")
                {
                    Toast.MakeText(this, "Phone No field cannot be empty ", ToastLength.Long).Show();
                    return;
                }
                else
                if (number.Text.Length != 11)
                {
                    Toast.MakeText(this, "11 digit number required in phone no field", ToastLength.Long).Show();
                    return;
                }
                else {

                    WebClient client = new WebClient();
                    Uri uri = new Uri("http://isp.kashmirbroadband.net/android/insertintomanager.php");
                    NameValueCollection parameters = new NameValueCollection();
                    parameters.Add("username", user.Text);
                    parameters.Add("password", pas.Text);
                    parameters.Add("name", name.Text);
                    parameters.Add("phone", number.Text);
                    parameters.Add("admin", ad);
                    parameters.Add("city", code);
                    client.UploadValuesCompleted += uploadcomlogin;
                    client.UploadValuesAsync(uri, parameters);

                }

            }
            catch (Java.Lang.Exception ex)
            {
                string Result = ex.Message;
            }
        }

        private void uploadcomlogin(object sender, UploadValuesCompletedEventArgs e)
        {
            RunOnUiThread(() => {

              
                

              
                    StartActivity(new Intent(this, typeof(Admin)));
                    Toast.MakeText(this, "value inserted successfully!", ToastLength.Short).Show();
               
                   

                


               




            });
        }
    }
}