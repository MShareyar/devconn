const MainSideBarMenu = [
    {
        url: route("admin.dashboard"),
        name: "Dasbhoard",
        icon: "fas fa-tachometer-alt",
        component: "Dashboard",
    },

    {
        url: route("logout"),
        name: "Logout",
        icon: "fas fa-sign-out-alt",
        component: "Logout",
    },
];

export default MainSideBarMenu;