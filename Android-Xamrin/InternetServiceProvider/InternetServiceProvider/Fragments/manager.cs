using Android.OS;
using Android.Support.V4.App;
using Android.Views;
using Android.Widget;
using System.Collections.Generic;
using InternetServiceProvider.ListsViews;
using com.refractored.fab;
using System.Net;
using System;
using System.Text;
using Android.Content;
using InternetServiceProvider.Activities;
using Newtonsoft.Json;

namespace InternetServiceProvider.Fragments
{
    public class manager : Fragment
    {
        private ListView mListView;
        private List<managersData> mgr;
        private ProgressBar mProgressBar;
        private BaseAdapter<managersData> mAdapter;
        
        public override void OnCreate(Bundle savedInstanceState)
        {
            base.OnCreate(savedInstanceState);

            // Create your fragment here
        }

        public static manager NewInstance()
        {
            var frag1 = new manager { Arguments = new Bundle() };
            return frag1;
        }


        public override View OnCreateView(LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState)
        {
			var ignored = base.OnCreateView(inflater, container, savedInstanceState);
			View view = inflater.Inflate(Resource.Layout.manager, container, false);
			mProgressBar = view.FindViewById<ProgressBar>(Resource.Id.progressBar88);
			mListView = view.FindViewById<ListView>(Resource.Id.listView);
			FloatingActionButton fab = view.FindViewById<FloatingActionButton>(Resource.Id.fab);
			try{
           
            WebClient client = new WebClient();
            Uri uri = new Uri("http://isp.kashmirbroadband.net/android/managerdata.php");



         


            fab.Click += (sender, args) =>
            {
                StartActivity(new Intent(Activity, typeof(insertmanager)));
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
                    try {
                        string json = Encoding.UTF8.GetString(e.Result);
                        mgr = JsonConvert.DeserializeObject<List<managersData>>(json);

                        mAdapter = new ManagerAdaptor(Activity, Resource.Layout.mgrRows, mgr);
                        mListView.Adapter = mAdapter;
                        mProgressBar.Visibility = ViewStates.Gone;

                    }catch(Exception ex)
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