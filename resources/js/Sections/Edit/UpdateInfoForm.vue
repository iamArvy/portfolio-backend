<script setup>
import { ref } from 'vue';
import { Link, router, useForm } from '@inertiajs/vue3';
import ActionMessage from '@/Components/ActionMessage.vue';
import FormSection from '@/Components/FormSection.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const props = defineProps({
    user: Object,
    info: Object
});

const form = useForm({
    name: props.info.name,
    nickname: props.info.nickname,
    brand: props.info.brand,
    other_nickname: props.info.other_nickname,
    gender : props.info.gender,
    job_desc : props.info.job_desc,
    origin : props.info.origin,
    currently : props.info.currently,
    phone : props.info.phone,
    cv: props.info.cv
});

const cvInput = ref(null);


// const selectNewPhoto = () => {
//     photoInput.value.click();
// };

// const updatePhotoPreview = () => {
//     const file = cvInput.value.files[0];

//     if (! file) return;

//     const reader = new FileReader();

//     reader.onload = (e) => {
//         photoPreview.value = e.target.result;
//     };

//     reader.readAsDataURL(photo);
// };


const updateInfo = () => {
    console.log(cvInput);
    if (cvInput.value) {
        form.cv = cvInput.value.files[0];
    }
    else{
        form.cv = null;
    }
    form.post(route('info.edit'), {
        // errorBag: 'updateProfileInformation',
        preserveScroll: true,
        // onSuccess: () => clearPhotoFileInput(),
    });
};

</script>

<template>
    <FormSection @submit.prevent="updateInfo">
        <template #title>
            Information
        </template>

        <template #description>
            Update Page Information.
        </template>

        <template #form>
            <!-- Name -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="name" value="Name" />
                <TextInput
                    id="name"
                    v-model="form.name"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autocomplete="name"
                />
                <InputError :message="form.errors.name" class="mt-2" />
            </div>

            
            <!-- Email -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="nickname" value="Nickname" />
                <TextInput
                    id="nickname"
                    v-model="form.nickname"
                    type="text"
                    class="mt-1 block w-full"
                />
                <InputError :message="form.errors.nickname" class="mt-2" />
            </div>
            <!-- Email -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="brand" value="Brand" />
                <TextInput
                    id="brand"
                    v-model="form.brand"
                    type="text"
                    class="mt-1 block w-full"
                />
                <InputError :message="form.errors.brand" class="mt-2" />
            </div>
            <!-- Email -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="other_nickname" value="Other Nickname" />
                <TextInput
                    id="other_nickname"
                    v-model="form.other_nickname"
                    type="text"
                    class="mt-1 block w-full"
                />
                <InputError :message="form.errors.other_nickname" class="mt-2" />
            </div>
            <!-- Email -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="gender" value="Gender" />
                <TextInput
                    id="gender"
                    v-model="form.gender"
                    class="mt-1 block w-full"
                    type="text"
                />
                <InputError :message="form.errors.gender" class="mt-2" />
            </div>
            <!-- Email -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="job_desc" value="Job Description" />
                <TextInput
                    id="job_desc"
                    v-model="form.job_desc"
                    type="text"
                    class="mt-1 block w-full"
                />
                <InputError :message="form.errors.job_desc" class="mt-2" />
            </div>
            <!-- Email -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="origin" value="Origin" />
                <TextInput
                    id="origin"
                    v-model="form.origin"
                    type="text"
                    class="mt-1 block w-full"
                />
                <InputError :message="form.errors.origin" class="mt-2" />
            </div>
            <!-- Email -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="currently" value="Currently" />
                <TextInput
                    id="currently"
                    v-model="form.currently"
                    type="text"
                    class="mt-1 block w-full"
                    required
                />
                <InputError :message="form.errors.currently" class="mt-2" />
            </div>
            <!-- Email -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="phone" value="Phone" />
                <TextInput
                    id="phone"
                    v-model="form.phone"
                    type="number"
                    class="mt-1 block w-full"
                    required
                />
                <InputError :message="form.errors.phone" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="cv" value="CV" />
                <input type="file" id="cv" class="mt-1 block w-full" ref="cvInput">
                <InputError :message="form.errors.cv" class="mt-2" />
            </div>
        </template>

        <template #actions>
            <ActionMessage :on="form.recentlySuccessful" class="me-3">
                Saved.
            </ActionMessage>

            <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Save
            </PrimaryButton>
        </template>
    </FormSection>
</template>
