import {
  mdiMonitor,
  mdiAccountGroup,
  mdiPackageVariantClosed,
  mdiClipboardList,
  mdiLogout,
  mdiViewList
} from '@mdi/js'

export default [
  {
    route: 'admin.dashboard',
    icon: mdiMonitor,
    label: 'Dashboard'
  },
  {
    label: 'Management',
    icon: mdiViewList,
    menu: [
      {
        label: 'Users',
        icon: mdiAccountGroup,
        route: 'admin.users.index'
      },
      {
        label: 'Products',
        icon: mdiPackageVariantClosed,
        route: 'admin.products.index'
      },
      {
        label: 'Orders',
        icon: mdiClipboardList,
        route: 'admin.orders.index'
      }
    ]
  },
  {
    label: 'Logout',
    icon: mdiLogout,
    isLogout: true
  }
]