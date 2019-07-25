<template>
    <div class="sticky-top">
        <ul class="nav flex-column background py-1 mt-3 sidebar-nav">
            <li class="nav-item">
                <span class="nav-link main-title">Dashboards</span>
            </li>

            <li class="nav-item">
                <router-link class="nav-link" :to="{ name: 'home' }">Home</router-link>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#articles" data-toggle="collapse" aria-expanded="false" aria-controls="articles">
                    Articles <i class="float-right fas fa-caret-down"></i>
                </a>
            </li>
            <div class="collapse" id="articles">
                <ul class="nav flex-column nav-sub-menu">
                    <li class="nav-item">
                        <router-link class="nav-link" :to="{ name: 'articles.create' }">Create New Article</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" :to="{ name: 'articles.index' }">View Articles</router-link>
                    </li>
                </ul>
            </div>

            <li class="nav-item">
                <a class="nav-link" href="#users" data-toggle="collapse" aria-expanded="false" aria-controls="users">
                    Users <i class="float-right fas fa-caret-down"></i>
                </a>
            </li>
            <div class="collapse" id="users">
                <ul class="nav flex-column nav-sub-menu">
                    <li class="nav-item">
                        <router-link class="nav-link" :to="{ name: 'users.create' }">Create New User</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" :to="{ name: 'users.index' }">View Users</router-link>
                    </li>
                </ul>
            </div>

            <li class="nav-item">
                <a class="nav-link" href="#partners" data-toggle="collapse" aria-expanded="false" aria-controls="partners">
                    Partners <i class="float-right fas fa-caret-down"></i>
                </a>
            </li>
            <div class="collapse" id="partners">
                <ul class="nav flex-column nav-sub-menu">
                    <li class="nav-item">
                        <router-link class="nav-link" :to="{ name: 'partners.create' }">Create New Partner</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" :to="{ name: 'partners.index' }">View Partners</router-link>
                    </li>
                </ul>
            </div>

            <li class="nav-item">
                <a class="nav-link" href="#categories" data-toggle="collapse" aria-expanded="false" aria-controls="categories">
                    Categories <i class="float-right fas fa-caret-down"></i>
                </a>
            </li>
            <div class="collapse" id="categories">
                <ul class="nav flex-column nav-sub-menu">
                    <li class="nav-item">
                        <router-link class="nav-link" :to="{ name: 'categories.create' }">Create New Category</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" :to="{ name: 'categories.index' }">View Categories</router-link>
                    </li>
                </ul>
            </div>

            <li class="nav-item">
                <a class="nav-link" href="#projects" data-toggle="collapse" aria-expanded="false" aria-controls="projects">
                    Projects <i class="float-right fas fa-caret-down"></i>
                </a>
            </li>
            <div class="collapse" id="projects">
                <ul class="nav flex-column nav-sub-menu">
                    <li class="nav-item">
                        <router-link class="nav-link" :to="{ name: 'projects.create' }">Create New Project</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" :to="{ name: 'projects.index' }">View Projects</router-link>
                    </li>
                </ul>
            </div>

            <li class="nav-item">
                <a class="nav-link" href="#brands" data-toggle="collapse" aria-expanded="false" aria-controls="brands">
                    Brands <i class="float-right fas fa-caret-down"></i>
                </a>
            </li>
            <div class="collapse" id="brands">
                <ul class="nav flex-column nav-sub-menu">
                    <li class="nav-item">
                        <router-link class="nav-link" :to="{ name: 'brands.create' }">Create New Brand</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" :to="{ name: 'brands.index' }">View Brands</router-link>
                    </li>
                </ul>
            </div>
        </ul>
    </div>
</template>
