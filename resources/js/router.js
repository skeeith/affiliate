import Vue from 'vue';
import Router from 'vue-router';

Vue.use(Router);

const Home = () => import('./views/Home');

/**
 * Users
 * 
 */
const UsersIndex = () => import('./views/users/Index');
const UsersCreate = () => import('./views/users/Create');
const UsersView = () => import('./views/users/View');
const UsersEdit = () => import('./views/users/Edit');

/*
* Projects
* 
 */
const ProjectsIndex = () => import('./views/projects/Index');
const ProjectsCreate = () => import('./views/projects/Create');
const ProjectsView = () => import('./views/projects/View');
const ProjectsEdit = () => import('./views/projects/Edit');

/*
* Partners
* 
 */
const PartnersIndex = () => import('./views/partners/Index');
const PartnersCreate = () => import('./views/partners/Create');
const PartnersView = () => import('./views/partners/View');
const PartnersEdit = () => import('./views/partners/Edit');

/*
* Brands
* 
 */
const BrandsIndex = () => import('./views/brands/Index');
const BrandsCreate = () => import('./views/brands/Create');
const BrandsView = () => import('./views/brands/View');
const BrandsEdit = () => import('./views/brands/Edit');

/*
* Categories
* 
 */
const CategoriesIndex = () => import('./views/categories/Index');
const CategoriesCreate = () => import('./views/categories/Create');
const CategoriesView = () => import('./views/categories/View');
const CategoriesEdit = () => import('./views/categories/Edit');

/*
* Articles
* 
 */
const ArticlesIndex = () => import('./views/articles/Index');
const ArticlesCreate = () => import('./views/articles/Create');
const ArticlesView = () => import('./views/articles/View');
const ArticlesEdit = () => import('./views/articles/Edit');

const router = new Router({
  mode: 'history',
  routes: [
    // Home
    { path: '/', name: 'home', component: Home },

    // Users
    { path: '/users', name: 'users.index', component: UsersIndex },
    { path: '/users/create', name: 'users.create', component: UsersCreate },
    { path: '/users/:id', name: 'users.view', component: UsersView },
    { path: '/users/:id/edit', name: 'users.edit', component: UsersEdit },

    // Projects
    { path: '/projects', name: 'projects.index', component: ProjectsIndex },
    { path: '/projects/create', name: 'projects.create', component: ProjectsCreate },
    { path: '/projects/:id', name: 'projects.view', component: ProjectsView },
    { path: '/projects/:id/edit', name: 'projects.edit', component: ProjectsEdit },

    // Partners
    { path: '/partners', name: 'partners.index', component: PartnersIndex },
    { path: '/partners/create', name: 'partners.create', component: PartnersCreate },
    { path: '/partners/:id', name: 'partners.view', component: PartnersView },
    { path: '/partners/:id/edit', name: 'partners.edit', component: PartnersEdit },

    // Brands
    { path: '/brands', name: 'brands.index', component: BrandsIndex },
    { path: '/brands/create', name: 'brands.create', component: BrandsCreate },
    { path: '/brands/:id', name: 'brands.view', component: BrandsView },
    { path: '/brands/:id/edit', name: 'brands.edit', component: BrandsEdit },

    // Categories
    { path: '/categories', name: 'categories.index', component: CategoriesIndex },
    { path: '/categories/create', name: 'categories.create', component: CategoriesCreate },
    { path: '/categories/:id', name: 'categories.view', component: CategoriesView },
    { path: '/categories/:id/edit', name: 'categories.edit', component: CategoriesEdit },

    // Articles
    { path: '/articles', name: 'articles.index', component: ArticlesIndex },
    { path: '/articles/create', name: 'articles.create', component: ArticlesCreate },
    { path: '/articles/:id', name: 'articles.view', component: ArticlesView },
    { path: '/articles/:id/edit', name: 'articles.edit', component: ArticlesEdit }
  ]
});

export default router;
