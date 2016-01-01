using System;
using System.Collections.Generic;
using System.Text;
using Android.OS;
using Android.Views;
using Android.Widget;
using System.Net;
using Newtonsoft.Json;
using InternetServiceProvider.ListsViews;

namespace InternetServiceProvider.Fragments
{

    public class IP_Pool : Android.Support.V4.App.Fragment
    {
        private ListView mListView;
        private List<ip_poolData> ip;
        private ProgressBar mProgressBar;
        private BaseAdapter<ip_poolData> mAdapter;
        public override void OnCreate(Bundle savedInstanceState)
        {
            base.OnCreate(savedInstanceState);

            // Create your fragment here
        }
        public static IP_Pool NewInstance()
        {
            var frag5 = new IP_Pool { Arguments = new Bundle() };
            return frag5;
        }
        public override View OnCreateView(LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState)
        {
            // Use this to return your custom view for this Fragment
            // return inflater.Inflate(Resource.Layout.YourFragment, container, false);
			var ignored = base.OnCreateView(inflater, container, savedInstanceState);
			View view = inflater.Inflate(Resource.Layout.ip_pool, container, false);
			mProgressBar = view.FindViewById<ProgressBar>(Resource.Id.progressBar44);
			mListView = view.FindViewById<ListView>(Resource.Id.listView);
			try{
            
           
            WebClient client = new WebClient();
            Uri uri = new Uri("http://isp.kashmirbroadband.net/android/ip_poolData.php");



           

            

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
                    ip = JsonConvert.DeserializeObject<List<ip_poolData>>(json);

                    mAdapter = new ip_poolAdaptor(Activity, Resource.Layout.Ip_poolRows, ip);
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