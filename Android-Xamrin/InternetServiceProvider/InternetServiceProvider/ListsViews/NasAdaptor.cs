using System.Collections.Generic;
using Android.Content;
using Android.Views;
using Android.Widget;

namespace InternetServiceProvider.ListsViews
{
    class NasAdaptor : BaseAdapter<NasData>
    {
        private List<NasData> Nas;
        private Context context;
        private int mLayout;
        public NasAdaptor(Context mcontext, int layout, List<NasData> nas)
        {
            context = mcontext;
            Nas = nas;
            mLayout = layout;
        }
        public override NasData this[int position]
        {
            get
            {
                return Nas[position];
            }
        }

        public override int Count
        {
            get
            {
              return  Nas.Count;
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
            rows.FindViewById<TextView>(Resource.Id.ip_pool1123).Text = Nas[position].ippool1;


            rows.FindViewById<TextView>(Resource.Id.Name1).Text = Nas[position].Name1;


            rows.FindViewById<TextView>(Resource.Id.nas_ip).Text = Nas[position].nasip1;
            return rows;

        }
    }
}