using Android.App;
using Android.Content.PM;
using Android.OS;
using Android.Support.V4.Widget;
using Android.Views;
using Android.Widget;
using InternetServiceProvider.Fragments;
using Android.Support.Design.Widget;

namespace InternetServiceProvider.Activities
{
    [Activity(Label = "Home", MainLauncher = false, LaunchMode = LaunchMode.SingleTop, Icon = "@drawable/Icon")]
    public class Admin : AdminBaseActivity
    {

        DrawerLayout drawerLayout;
        NavigationView navigationView;
		TextView user;
        protected override int LayoutResource
        {
            get
            {
                return Resource.Layout.main;
            }
        }

        protected override void OnCreate(Bundle savedInstanceState)
        {
            base.OnCreate(savedInstanceState);


            drawerLayout = this.FindViewById<DrawerLayout>(Resource.Id.drawer_layout);
			user=this.FindViewById<TextView>(Resource.Id.us1);
			user.Text = Intent.GetStringExtra ("username");
            //Set hamburger items menu
            SupportActionBar.SetHomeAsUpIndicator(Resource.Drawable.ic_menu);

            //setup navigation view
            navigationView = FindViewById<NavigationView>(Resource.Id.nav_view);

            //handle navigation
            navigationView.NavigationItemSelected += (sender, e) =>
            {
                e.MenuItem.SetChecked(true);

                switch (e.MenuItem.ItemId)
                {
                    case Resource.Id.nav_home_1:
                        ListItemClicked(0);
                        break;
                    case Resource.Id.nav_home_2:
                        ListItemClicked(1);
                        break;
                    case Resource.Id.nav_home_3:
                        ListItemClicked(2);
                        break;
                    case Resource.Id.nav_home_4:
                        ListItemClicked(3);
                        break;
                    case Resource.Id.nav_home_5:
                        ListItemClicked(4);
                        break;
                    case Resource.Id.nav_home_6:
                        ListItemClicked(5);
                        break;
                    case Resource.Id.nav_home_7:
                        ListItemClicked(6);
                        break;
                    case Resource.Id.nav_home_8:
                        ListItemClicked(7);
                        break;
                }

               

                drawerLayout.CloseDrawers();
            };


            //if first time you will want to go ahead and click first item.
            if (savedInstanceState == null)
            {
                ListItemClicked(0);
            }
        }

        int oldPosition = -1;
        private void ListItemClicked(int position)
        {
            //this way we don't load twice, but you might want to modify this a bit.
            if (position == oldPosition)
                return;

            oldPosition = position;

            Android.Support.V4.App.Fragment fragment = null;
            switch (position)
            {
                case 0:
                    fragment = manager.NewInstance();
                    break;
                case 1:
                    fragment = Customers.NewInstance();
                    break;
                case 2:
                    fragment = Area.NewInstance();
                    break;
                case 3:
                    fragment = City.NewInstance();
                    break;
                case 4:
                    fragment = IP_Pool.NewInstance();
                    break;
                case 5:
                    fragment = NAS.NewInstance();
                    break;
                case 6:
                    fragment = Packages.NewInstance();
                    break;
                case 7:
                    fragment = about.NewInstance();
                    break;
            }

            SupportFragmentManager.BeginTransaction()
                .Replace(Resource.Id.content_frame, fragment)
                .Commit();
        }

        public override bool OnOptionsItemSelected(IMenuItem item)
        {
            switch (item.ItemId)
            {
                case Android.Resource.Id.Home:
                    drawerLayout.OpenDrawer(Android.Support.V4.View.GravityCompat.Start);
                    return true;
            }
            return base.OnOptionsItemSelected(item);
        }
    }
}

