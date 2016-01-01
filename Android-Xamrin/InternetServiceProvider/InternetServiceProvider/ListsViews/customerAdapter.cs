
using Android.Widget;
using System.Collections.Generic;
using Android.Views;
using System;
using Android.Content;

namespace InternetServiceProvider.ListsViews
{
    class customerAdapter : BaseAdapter<customerData>
    {
        private List<customerData> customer;
        private Context context;
        private int mLayout;
        public customerAdapter(Context mcontext, int layout, List<customerData> cus)
        {
            context = mcontext;
            customer = cus;
            mLayout = layout;
        }
        public override int Count
        {
            get
            {
              return  customer.Count;
            }
        }

        public override customerData this[int position]
        {
            get
            {
                return customer[position];
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
            rows.FindViewById<TextView>(Resource.Id.name1).Text = customer[position].Name;


            rows.FindViewById<TextView>(Resource.Id.user).Text = customer[position].username;


            rows.FindViewById<TextView>(Resource.Id.pas).Text = customer[position].phone;


            rows.FindViewById<TextView>(Resource.Id.phone1).Text = customer[position].phone;

            rows.FindViewById<TextView>(Resource.Id.cnic1).Text = customer[position].cnic;

            rows.FindViewById<TextView>(Resource.Id.package1).Text = customer[position].pack;

            rows.FindViewById<TextView>(Resource.Id.reg).Text = customer[position].regdate;

            return rows;
        }
    }
}