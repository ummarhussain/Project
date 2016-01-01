
using System;
using System.Collections.Generic;
using System.Net;
using System.Text;
using InternetServiceProvider.ListsViews;
using Android.OS;
using Android.Views;
using Android.Widget;
using Newtonsoft.Json;
using com.refractored.fab;

namespace InternetServiceProvider.Fragments
{
    public class City : Android.Support.V4.App.Fragment
    {
        private ListView mListView;
        private List<cityData> cit;
        private ProgressBar mProgressBar;
        private BaseAdapter<cityData> mAdapter;
        public override void OnCreate(Bundle savedInstanceState)
        {
            base.OnCreate(savedInstanceState);

            // Create your fragment here
        }
        public static City NewInstance()
        {
            var frag4 = new City { Arguments = new Bundle() };
            return frag4;
        }
        public override View OnCreateView(LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState)
        {
            // Use this to return your custom view for this Fragment
            // return inflater.Inflate(Resource.Layout.YourFragment, container, false);

			var ignored = base.OnCreateView(inflater, container, savedInstanceState);
			View view = inflater.Inflate(Resource.Layout.city, container, false);
			mProgressBar = view.FindViewById<ProgressBar>(Resource.Id.progressBar22);
			mListView = view.FindViewById<ListView>(Resource.Id.listView);

			try{
         
		    WebClient client = new WebClient();
            Uri uri = new Uri("http://isp.kashmirbroadband.net/android/citydata.php");
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
                   cit= JsonConvert.DeserializeObject<List<cityData>>(json);

                    mAdapter = new cityAdaptor(Activity, Resource.Layout.cityRows, cit);
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