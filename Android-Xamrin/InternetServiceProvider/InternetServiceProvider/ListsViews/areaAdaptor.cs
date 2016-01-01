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
    class areaAdaptor : BaseAdapter<areadata>
    {
        private List<areadata> area;
        private Context context;
        private int mLayout;
        public areaAdaptor(Context mcontext, int layout, List<areadata> are)
        {
            context = mcontext;
            area = are;
            mLayout = layout;
        }
        public override areadata this[int position]
        {
            get
            {
                return area[position];
            }
        }

        public override int Count
        {
            get
            {
                return area.Count;
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
            rows.FindViewById<TextView>(Resource.Id.Area).Text = area[position].Aname;


            rows.FindViewById<TextView>(Resource.Id.code).Text = area[position].Ccode;
            return rows;
        }
    }
}