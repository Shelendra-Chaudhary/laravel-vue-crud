<script setup lang="ts">
import { Head, useForm } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import Button from '@/components/ui/button/Button.vue';
import Input from '@/components/ui/input/Input.vue';
import Label from '@/components/ui/label/Label.vue';
import products from '@/routes/products';

interface Product {
    id: number;
    name: string;
    price: number;
    description: string;
}

const props = defineProps<{
    product: Product;
}>();

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Update a Product',
        href: products.edit.url(props.product.id),
    },
];

const form = useForm({
    name: props.product.name,
    price: props.product.price,
    description: props.product.description,
});

const handleSubmit = () => {
    form.put(products.update.url(props.product.id));
};
</script>

<template>

    <Head title="Update a Product" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="p-4">
            <form @submit.prevent="handleSubmit" class="flex flex-col gap-4">
                <Label for="name">Product Name</Label>
                <Input v-model="form.name" type="text" placeholder="Product Name" />
                <div v-if="form.errors.name" class="text-red-500">{{ form.errors.name }}</div>

                <Label for="price">Price</Label>
                <Input v-model="form.price" type="number" placeholder="Price" />
                <div v-if="form.errors.price" class="text-red-500">{{ form.errors.price }}</div>

                <Label for="description">Product Description</Label>
                <Input v-model="form.description" type="text" placeholder="Product Description" />
                <div v-if="form.errors.description" class="text-red-500">{{ form.errors.description }}</div>

                <Button type="submit" :disabled="form.processing">
                    Update Product
                </Button>
            </form>
        </div>
    </AppLayout>
</template>
