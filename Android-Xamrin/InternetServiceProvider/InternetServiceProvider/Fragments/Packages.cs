using System;
using System.Collections.Generic;
using Android.OS;
using Android.Views;
using Android.Widget;
using InternetServiceProvider.ListsViews;
using System.Net;
using Newtonsoft.Json;
using System.Text;
using Android.Support.Design.Widget;

namespace InternetServiceProvider.Fragments
{
    public class Packages : Android.Support.V4.App.Fragment
    {
        private ListView mListView;
        private List<packagesData> pack;
        private ProgressBar mProgressBar;
        private BaseAdapter<packagesData> mAdapter;
        public override void OnCreate(Bundle savedInstanceState)
        {
            base.OnCreate(savedInstanceState);

            // Create your fragment here
        }
        public static Packages NewInstance()
        {
            var frag7 = new Packages { Arguments = new Bundle() };
            return frag7;
        }
        public override View OnCreateView(LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState)
        {
            // Use this to return your custom view for this Fragment
            // return inflater.Inflate(Resource.Layout.YourFragment, container, false);
			View view = inflater.Inflate(Resource.Layout.packages, container, false);
			mProgressBar = view.FindViewById<ProgressBar>(Resource.Id.progressBar666);
			mListView = view.FindViewById<ListView>(Resource.Id.listView);
			try{
           

            WebClient client = new WebClient();
            Uri uri = new Uri("http://isp.kashmirbroadband.net/android/packagesData.php");

           



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
                    pack = JsonConvert.DeserializeObject<List<packagesData>>(json);

                    mAdapter = new packagesAdaptor(Activity, Resource.Layout.packagesRows, pack);
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