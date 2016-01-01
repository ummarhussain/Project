using Android.OS;

using Android.Support.V4.App;

using Android.Views;
using Android.Widget;

using Newtonsoft.Json;
using System;
using System.Collections.Generic;
using System.Net;
using System.Text;
using InternetServiceProvider.ListsViews;
using com.refractored.fab;
using InternetServiceProvider.Activities;
using Android.Content;

namespace InternetServiceProvider.Fragments
{
    public class Customers : Fragment
    {


        private ListView mListView;
        private List<customerData> custom;
        private ProgressBar mProgressBar;
        private BaseAdapter<customerData> mAdapter;
       

        public override void OnCreate(Bundle savedInstanceState)
        {
            base.OnCreate(savedInstanceState);

            // Create your fragment here
        }

        public static Customers NewInstance()
        {
            var frag2 = new Customers { Arguments = new Bundle() };
            return frag2;
        }


        public override View OnCreateView(LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState)
        {
			var ignored = base.OnCreateView(inflater, container, savedInstanceState);
			View view = inflater.Inflate(Resource.Layout.customers, container, false);

			mProgressBar = view.FindViewById<ProgressBar>(Resource.Id.progressBar33);
			mListView = view.FindViewById<ListView>(Resource.Id.listView);
			try{
           
           
            WebClient client = new WebClient();
            Uri uri = new Uri("http://isp.kashmirbroadband.net/android/customerdata.php");

            FloatingActionButton fab = view.FindViewById<FloatingActionButton>(Resource.Id.fab334);
        
            fab.Click += (sender, args) =>
            {
                StartActivity(new Intent(Activity, typeof(insercustomer)));
            };

            client.DownloadDataAsync(uri);
            client.DownloadDataCompleted += mClient_DownloadDataCompleted;
			
			}catch(Exception ex)
			{

				Toast.MakeText(Activity, "Something Went Wrong!", ToastLength.Short).Show();
				mProgressBar.Visibility = ViewStates.Gone;
			}
            
			return view;


        }

        private void mClient_DownloadDataCompleted(object sender, DownloadDataCompletedEventArgs e)
        {
            Activity.RunOnUiThread(() =>
            {
                try
                {
                    string json = Encoding.UTF8.GetString(e.Result);
                    custom = JsonConvert.DeserializeObject<List<customerData>>(json);

                    mAdapter = new customerAdapter(Activity, Resource.Layout.customerRows, custom);
                    mListView.Adapter = mAdapter;
                    mProgressBar.Visibility = ViewStates.Gone;

                }
                catch (Exception ex)
                {
                    Console.WriteLine(ex);
                    Toast.MakeText(Activity, "Something Went Wrong!", ToastLength.Short).Show();
                    mProgressBar.Visibility = ViewStates.Gone;
                }
                mProgressBar.Visibility = ViewStates.Gone;
            });
        }
    }






}