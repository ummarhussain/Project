using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

using Android.App;
using Android.Content;
using Android.OS;
using Android.Runtime;
using Android.Views;
using Android.Widget;

namespace InternetServiceProvider.ListsViews
{
    class ip_poolAdaptor : BaseAdapter<ip_poolData>
    {
        private List<ip_poolData> ippool;
        private Context context;
        private int mLayout;
        public ip_poolAdaptor(Context mcontext, int layout, List<ip_poolData> ip)
        {
            context = mcontext;
            ippool = ip;
            mLayout = layout;
        }
        public override ip_poolData this[int position]
        {
            get
            {
                return ippool[position];
            }
        }

        public override int Count
        {
            get
            {
                return ippool.Count;
            }
        }

        public override long GetItemId(int position)
        {
            return position;
        }

        public override View GetView(int position, View convertView, ViewGroup parent)
        {

            View rows = convertView;
            if (rows == null)
            {
                rows = LayoutInflater.From(context).Inflate(mLayout, parent, false);
            }
            rows.FindViewById<TextView>(Resource.Id.poolname).Text = ippool[position].poolname;


            rows.FindViewById<TextView>(Resource.Id.poolspace).Text = ippool[position].poolspace;
            return rows;
        }
    }
}