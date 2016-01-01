using System.Collections.Generic;
using Android.OS;
using Android.Views;
using Android.Widget;
using InternetServiceProvider.ListsViews;
using System.Net;
using System;
using System.Text;
using Newtonsoft.Json;

namespace InternetServiceProvider.Fragments
{
    public class NAS : Android.Support.V4.App.Fragment
    {
        private ListView mListView;
        private List<NasData> nas;
        private ProgressBar mProgressBar;
        private BaseAdapter<NasData> mAdapter;
        public override void OnCreate(Bundle savedInstanceState)
        {
            base.OnCreate(savedInstanceState);

            // Create your fragment here
        }
        public static NAS NewInstance()
        {
            var frag6 = new NAS { Arguments = new Bundle() };
            return frag6;
        }
        public override View OnCreateView(LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState)
        {
            // Use this to return your custom view for this Fragment
            // return inflater.Inflate(Resource.Layout.YourFragment, container, false);
			var ignored = base.OnCreateView(inflater, container, savedInstanceState);
			View view = inflater.Inflate(Resource.Layout.Nas, container, false);
			mProgressBar = view.FindViewById<ProgressBar>(Resource.Id.progressBar556);
			mListView = view.FindViewById<ListView>(Resource.Id.listView);
			try{
          

            WebClient client = new WebClient();
            Uri uri = new Uri("http://isp.kashmirbroadband.net/android/nasData.php");
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
                nas = JsonConvert.DeserializeObject<List<NasData>>(json);

                mAdapter = new NasAdaptor(Activity, Resource.Layout.NasRows, nas);
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
