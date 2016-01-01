using Android.OS;
using Android.Views;
using Android.Widget;
using InternetServiceProvider.ListsViews;
using Newtonsoft.Json;
using System;
using System.Collections.Generic;
using System.Net;
using System.Text;

namespace InternetServiceProvider.Fragments
{
    public class Area : Android.Support.V4.App.Fragment
    {
        private ListView mListView;
        private List<areadata> area;
        private ProgressBar mProgressBar;
        private BaseAdapter<areadata> mAdapter;
        public override void OnCreate(Bundle savedInstanceState)
        {
            base.OnCreate(savedInstanceState);

            // Create your fragment here
        }

        public static Area NewInstance()
        {
            var frag3 = new Area { Arguments = new Bundle() };
            return frag3;
        }

        public override View OnCreateView(LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState)
        {
            // Use this to return your custom view for this Fragment
            // return inflater.Inflate(Resource.Layout.YourFragment, container, false);
			var ignored = base.OnCreateView(inflater, container, savedInstanceState);
			View view = inflater.Inflate(Resource.Layout.area, container, false);
			mProgressBar = view.FindViewById<ProgressBar>(Resource.Id.progressBar11);
			mListView = view.FindViewById<ListView>(Resource.Id.listView);
			try
			{
           

           

            WebClient client = new WebClient();
            Uri uri = new Uri("http://isp.kashmirbroadband.net/android/areadata.php");

           

            




            client.DownloadDataAsync(uri);
            client.DownloadDataCompleted += mClient_DownloadDataCompleted;
			
			}catch (Exception ex)
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
                     area= JsonConvert.DeserializeObject<List<areadata>>(json);

                    mAdapter = new areaAdaptor(Activity, Resource.Layout.areaRows, area);
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