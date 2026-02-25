<script setup lang="ts">
import { Head, Link, usePage } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import Button from '@/components/ui/button/Button.vue';
import products from '@/routes/products';
import Alert from '@/components/ui/alert/Alert.vue';
import AlertTitle from '@/components/ui/alert/AlertTitle.vue';
import { Rocket, SquarePen, Trash2 } from 'lucide-vue-next';
import AlertDescription from '@/components/ui/alert/AlertDescription.vue';
import {
    Table,
    TableBody,
    TableCaption,
    TableCell,
    TableHead,
    TableHeader,
    TableRow,
} from '@/components/ui/table'


interface Product {
    id: number;
    name: string;
    price: number;
    description: string;
}

const props = defineProps<{
    allProducts: Product[];
}>();

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Products',
        href: products.index.url(),
    },
];

const page = usePage();

</script>

<template>

    <Head title="Products" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="p-4">
            <div v-if="page.props.flash?.message" class="mb-4">
                <Alert class="bg-blue-100 text-blue-800 mb-4">
                    <Rocket />
                    <AlertTitle>Notification</AlertTitle>
                    <AlertDescription>{{ page.props.flash.message }}</AlertDescription>
                </Alert>
            </div>


            <Link :href=products.create.url()><Button class="mb-4">Create Product</Button></Link>

            <div>
                <Table>
                    <TableCaption>A list of your recent products.</TableCaption>
                    <TableHeader>
                        <TableRow>
                            <TableHead>Id</TableHead>
                            <TableHead>Name</TableHead>
                            <TableHead>Price</TableHead>
                            <TableHead>Description</TableHead>
                            <TableHead class="text-center">Action</TableHead>
                        </TableRow>
                    </TableHeader>
                    <TableBody>
                        <TableRow v-for="product in props.allProducts" :key="product.id">
                            <TableCell>{{ product.id }}</TableCell>
                            <TableCell>{{ product.name }}</TableCell>
                            <TableCell>₹{{ product.price }}</TableCell>
                            <TableCell>{{ product.description }}</TableCell>
                            <TableCell class="text-center">
                                <div class="">
                                    <Link :href=products.edit.url(product.id) class="text-blue-500 hover:text-blue-700"><SquarePen /></Link>
                                <Link :href=products.destroy.url(product.id) method="delete" class="text-red-500 hover:text-red-700 ml-4"><Trash2 /></Link>
                                </div>
                                <!-- <Link :href=products.edit.url(product.id) class="text-blue-500 hover:text-blue-700"><SquarePen /></Link>
                                <Link :href=products.destroy.url(product.id) method="delete" class="text-red-500 hover:text-red-700 ml-4"><Trash2 /></Link> -->
                            </TableCell>
                        </TableRow>
                    </TableBody>
                </Table>

            </div>
        </div>
    </AppLayout>
</template>
