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
    class ManagerAdaptor : BaseAdapter<managersData>
    {
        private List<managersData> mgr;
        private Context context;
        private int mLayout;
        public ManagerAdaptor(Context mcontext, int layout, List<managersData> mmgr)
        {
            context = mcontext;

            mgr = mmgr;
            mLayout = layout;
        }

      

        public override int Count
        {
            get { return mgr.Count; }
        }

        public override managersData this[int position]
        {
            get
            {
                  return mgr[position]; 
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
            rows.FindViewById<TextView>(Resource.Id.user).Text = mgr[position].user;


            rows.FindViewById<TextView>(Resource.Id.password).Text = mgr[position].pas;


            rows.FindViewById<TextView>(Resource.Id.name).Text = mgr[position].name;


            rows.FindViewById<TextView>(Resource.Id.phone).Text = mgr[position].ph;

            rows.FindViewById<TextView>(Resource.Id.admin).Text = mgr[position].admin;



            return rows;

        }
    
    }
}