<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { Github, Linkedin, Link2, LayoutGrid, PackageSearch } from 'lucide-vue-next';
import NavFooter from '@/components/NavFooter.vue';
import NavMain from '@/components/NavMain.vue';
import NavUser from '@/components/NavUser.vue';
import {
    Sidebar,
    SidebarContent,
    SidebarFooter,
    SidebarHeader,
    SidebarMenu,
    SidebarMenuButton,
    SidebarMenuItem,
} from '@/components/ui/sidebar';
import { type NavItem } from '@/types';
import AppLogo from './AppLogo.vue';
import { dashboard } from '@/routes';
import products from '@/routes/products';

const mainNavItems: NavItem[] = [
    {
        title: 'Dashboard',
        href: dashboard(),
        icon: LayoutGrid,
    },
    {
        title: 'Products',
        href: products.index(),
        icon: PackageSearch,
    },
];

const footerNavItems: NavItem[] = [
    {
        title: 'Linkedin',
        href: 'https://www.linkedin.com/in/shelendra-chaudhary-015793119/',
        icon: Linkedin,
    },
    {
        title: 'Github',
        href: 'https://github.com/shelendra-chaudhary',
        icon: Github,
    },
    {
        title: 'Website',
        href: 'https://91techsquare.com',
        icon: Link2,
    }
];
</script>

<template>
    <Sidebar collapsible="icon" variant="inset">
        <SidebarHeader>
            <SidebarMenu>
                <SidebarMenuItem>
                    <SidebarMenuButton size="lg" as-child>
                        <Link :href="dashboard()">
                            <AppLogo />
                        </Link>
                    </SidebarMenuButton>
                </SidebarMenuItem>
            </SidebarMenu>
        </SidebarHeader>

        <SidebarContent>
            <NavMain :items="mainNavItems" />
        </SidebarContent>

        <SidebarFooter>
            <NavFooter :items="footerNavItems" />
            <NavUser />
        </SidebarFooter>
    </Sidebar>
    <slot />
</template>
