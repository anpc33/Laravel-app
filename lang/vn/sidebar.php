<?php
  return [
    'module' => [
      0 => [
        'name' => 'Menu',
        'children' => [
          0 => [
            'name' => 'Dashboard',
            'icon' => '<i class="ri-dashboard-2-line"></i>',
            'active' => ['dashboard'],
            'children' => [
              0 => [
                'name' => 'Dashboard',
                'route' => route('dashboard.index')
              ],

            ]
          ],
          1 => [
            'name' => 'User Management',
            'icon' => '<i class="ri-dashboard-2-line"></i>',
            'active' => ['user'],
            'children' => [
              0 => [
                'name' => 'User List',
                'route' => route('user.index')
              ],
              11 => [
                'name' => 'User Create',
                'route' => route('user.create')
              ]
            ]
          ],
          // 1 => [
          //   'name' => 'Product Management',
          //   'icon' => '<i class="ri-dashboard-2-line"></i>',
          //   'children' => [
          //     0 => [
          //       'name' => 'ProductProduct List',
          //       'route' => route('user.index')
          //     ],
          //     11 => [
          //       'name' => 'Product Create',
          //       'route' => route('user.create')
          //     ]
          //   ]
          // ]
        ]
      ],
    ]
  ];
?>
