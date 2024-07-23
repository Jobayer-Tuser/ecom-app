import {createBrowserRouter} from "react-router-dom";
import Login from "./pages/Login.jsx";
import Signup from "./pages/Signup.jsx"
import Notfound from "./pages/Notfound.jsx";
import DefaultLayout from "./components/DefaultLayout.jsx";
import GuestLayout from "./components/GuestLayout.jsx";
import Users from "./pages/Users.jsx";
import Dashboard from "./pages/Dashboard.jsx";

const router = createBrowserRouter([
    {
          path: "/",
          element: <GuestLayout/>,
          children: [
                {
                    path: '/login',
                    element: <Login/>
                },
                {
                    path: "register",
                    element: <Signup/>
                },
          ]
    },
    {
        path: "/",
        element: <DefaultLayout/>,
        children: [
            {
                path: '/users',
                element: <Users/>
            },
            {
                path: '/dashboard',
                element: <Dashboard/>
            },
        ]
    },
    {
        path: "*",
        element: <Notfound/>
    }
]);

export default router;
