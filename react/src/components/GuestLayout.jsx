import React from 'react';
import {Outlet} from "react-router-dom";

const GuestLayout = () => {
    return (
        <div>
            For guest users
            <Outlet/>
        </div>
    );
};

export default GuestLayout;
