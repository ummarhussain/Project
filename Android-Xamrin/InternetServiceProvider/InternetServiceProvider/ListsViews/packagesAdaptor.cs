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
    class packagesAdaptor : BaseAdapter<packagesData>
    {
        private List<packagesData> package;
        private Context context;
        private int mLayout;
        public packagesAdaptor(Context mcontext, int layout, List<packagesData> pack)
        {
            context = mcontext;
            package = pack;
            mLayout = layout;
        }

        public override packagesData this[int position]
        {
            get
            {
                return package[position];
            }
        }

        public override int Count
        {
            get
            {
                return package.Count;
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
            rows.FindViewById<TextView>(Resource.Id.PName11).Text = package[position].Name1;


            rows.FindViewById<TextView>(Resource.Id.speed111).Text = package[position].speed1;


            rows.FindViewById<TextView>(Resource.Id.price111).Text = package[position].price1;


            rows.FindViewById<TextView>(Resource.Id.validity11111).Text = package[position].validity1;

            return rows;
        }
    }
}