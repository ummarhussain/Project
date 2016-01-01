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
    class cityAdaptor : BaseAdapter<cityData>
    {
        private List<cityData> city;
        private Context context;
        private int mLayout;
        public cityAdaptor(Context mcontext, int layout, List<cityData> cit)
        {
            context = mcontext;
            city= cit;
            mLayout = layout;
        }
        public override cityData this[int position]
        {
            get
            {
                return city[position]; 
            }
        }

        public override int Count
        {
            get
            {
              return  city.Count;
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
            rows.FindViewById<TextView>(Resource.Id.city).Text = city[position].CName;


            rows.FindViewById<TextView>(Resource.Id.code1).Text = city[position].cod;

            return rows;
        }
    }
}