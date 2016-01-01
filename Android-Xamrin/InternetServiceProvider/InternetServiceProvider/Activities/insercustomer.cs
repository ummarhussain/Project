using System;

using Android.App;
using Android.Content;
using Android.OS;
using Android.Widget;
using System.Net;
using System.Collections.Specialized;
using Android.Views;

namespace InternetServiceProvider.Activities
{
    [Activity(Label = "insercustomer")]
    public class insercustomer : Activity
    {
        private Button insert;
        private EditText name;
        private EditText user;
        private EditText pas;
        private EditText number;
        private EditText cnic;
        private Spinner package;
		private Spinner sp;
        private Spinner muser;
        string code;
        string pack;
        string mmmuser;
        protected override void OnCreate(Bundle savedInstanceState)
        {
            base.OnCreate(savedInstanceState);
            SetContentView(Resource.Layout.insertcustomer);
            name = FindViewById<EditText>(Resource.Id.txtname);
            user = FindViewById<EditText>(Resource.Id.txtusername);
            pas = FindViewById<EditText>(Resource.Id.txtpassword);
            number = FindViewById<EditText>(Resource.Id.txtph22);
            cnic = FindViewById<EditText>(Resource.Id.txtcnic);
            package = FindViewById<Spinner>(Resource.Id.txtpackage);
			sp= FindViewById<Spinner>(Resource.Id.txtcitycode);
            muser = FindViewById<Spinner>(Resource.Id.txtMusername);
            insert = FindViewById<Button>(Resource.Id.btninsert21);


          



            var city = new string[] { "051", "052", "0992", "0996" };
            var pac = new string[] { "Free256K", "Home", "Student", "Unlimited"};
            var mmuser = new string[] { "atif", "awais", "hassan", "ummar" };
            sp.Adapter = new ArrayAdapter<string>(this, Android.Resource.Layout.SimpleSpinnerDropDownItem, city);
            sp.ItemSelected += new EventHandler<AdapterView.ItemSelectedEventArgs>(item_selected);

            package.Adapter = new ArrayAdapter<string>(this, Android.Resource.Layout.SimpleSpinnerDropDownItem, pac);
            package.ItemSelected += new EventHandler<AdapterView.ItemSelectedEventArgs>(item_selected1);

            muser.Adapter = new ArrayAdapter<string>(this, Android.Resource.Layout.SimpleSpinnerDropDownItem, mmuser);
            muser.ItemSelected += new EventHandler<AdapterView.ItemSelectedEventArgs>(item_selected2);
            insert.Click += Insertmgr;
           

        }

        private void item_selected2(object sender, AdapterView.ItemSelectedEventArgs e)
        {
            Spinner spinner = (Spinner)sender;
            mmmuser= string.Format("{0}", spinner.GetItemAtPosition(e.Position));
         
        }

        private void item_selected1(object sender, AdapterView.ItemSelectedEventArgs e)
        {
            Spinner spinner = (Spinner)sender;
            pack = string.Format("{0}", spinner.GetItemAtPosition(e.Position));
          
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
                if (name.Text == "")
                {
                    Toast.MakeText(this, "Name field cannot be empty", ToastLength.Long).Show();
                    return;
                }
                else
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
                else
                if (cnic.Text == "")
                {
                    Toast.MakeText(this, "cnic field cannot be empty ", ToastLength.Long).Show();
                    return;
                }
                else
                if (cnic.Text.Length != 13)
                {
                    Toast.MakeText(this, "13 digit number required in cnic field", ToastLength.Long).Show();
                    return;
                }
                else {
                    WebClient client = new WebClient();
                    Uri uri = new Uri("http://isp.kashmirbroadband.net/android/insertcustomer.php");
                    NameValueCollection parameters = new NameValueCollection();
                    parameters.Add("name", name.Text);
                    parameters.Add("user", user.Text);
                    parameters.Add("pas", pas.Text);
                    parameters.Add("phone", number.Text);
                    parameters.Add("cnic", cnic.Text);
                    parameters.Add("package", pack);
                    parameters.Add("citycode", code);
                    parameters.Add("muser", mmmuser);
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