<script setup lang="ts">
import { Head, Link, router, usePage } from '@inertiajs/vue3';
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
import Pagination from '@/components/Pagination.vue';

interface Product {
    id: number;
    name: string;
    price: number;
    description: string;
}

interface Paginated<T> {
    data: T[];
    links: {
        url: string | null;
        label: string;
        active: boolean;
    }[];
}

const props = defineProps<{
    allProducts: Paginated<Product>;
}>();

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Products',
        href: products.index.url(),
    },
];

const page = usePage();

const handleDelete = (id: number) => {
    if (confirm('Are you sure you want to delete this product?')) {
        router.delete(products.destroy.url(id))
    }
};

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

            <div class="flex items-center justify-between mb-4">
                <!-- Left side: create button -->
                <Button as-child>
                    <Link :href="products.create.url()">Create Product</Link>
                </Button>
                <!-- Right side: pagination -->
                <Pagination :links="props.allProducts.links" />
            </div>

            <div class="overflow-x-auto">
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
                        <TableRow v-for="product in props.allProducts.data" :key="product.id">
                            <TableCell>{{ product.id }}</TableCell>
                            <TableCell>{{ product.name }}</TableCell>
                            <TableCell>₹{{ product.price }}</TableCell>
                            <TableCell>{{ product.description }}</TableCell>
                            <TableCell class="text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <!-- Edit Button -->
                                    <Button as-child variant="ghost" size="icon"
                                        class="text-blue-500 hover:text-blue-600">
                                        <Link :href="products.edit.url(product.id)">
                                            <SquarePen class="w-4 h-4" />
                                        </Link>
                                    </Button>

                                    <!-- Delete Button -->
                                    <Button @click="handleDelete(product.id)" variant="ghost" size="icon"
                                        class="text-destructive">
                                        <Trash2 class="w-4 h-4" />
                                    </Button>
                                </div>
                            </TableCell>
                        </TableRow>
                    </TableBody>
                </Table>
            </div>
        </div>
    </AppLayout>
</template>
