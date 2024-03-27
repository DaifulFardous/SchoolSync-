import React from 'react'
import Sidenav from './../SideNav/Sidenav';
import Uppernav from './../Courses/Uppernav';

function Dashboard() {
  return (
    <div className='bg-opacity-100 bg-gray-200 min-h-screen'>
        <div className='flex'>
        <div className='fixed w-64'>
            <Sidenav/>
        </div>
        <div className='p-6 pl-72 fixed'>
            <Uppernav/>
        </div>

        </div>
    </div>
  )
}

export default Dashboard