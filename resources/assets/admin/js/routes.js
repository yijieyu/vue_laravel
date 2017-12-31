import Login from './components/admin/Login.vue'
import Base from './components/Base.vue'

/**
 * meta参数解析
 * hideLeft: 是否隐藏左侧菜单，单页菜单为true
 * module: 菜单所属模块
 * menu: 所属菜单，用于判断三级菜单是否显示高亮，如菜单列表、添加菜单、编辑菜单都是'menu'，用户列表、添加用户、编辑用户都是'user'，如此类推
 */

const routes = [
    {path: '/', component: Login, name: 'Login'},
    {
        path: '/admin',
        component: Base,
        children: [
            {
                path: 'index',
                name: 'index',
                meta: {hideLeft: false, module: 'Administrative', name: 'index'}
            }
        ]
    },
    {
        path: '/system',
        component: Base,
        children: [
            {
                path: 'user-list',
                name: 'userList',
                meta: {hideLeft: false, module: 'Administrative', name: 'userList'}
            }
        ]
    },
];
export default routes
