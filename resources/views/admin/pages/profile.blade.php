@extends('admin.layout.admin')
@section('admin_title', 'Dashboard')
@section('admin_pages')
    <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <div wire:id="oDdMtXnlxYbDoz0XnEHt" wire:initial-data="{&quot;fingerprint&quot;:{&quot;id&quot;:&quot;oDdMtXnlxYbDoz0XnEHt&quot;,&quot;name&quot;:&quot;profile.update-profile-information-form&quot;,&quot;locale&quot;:&quot;en&quot;,&quot;path&quot;:&quot;user\/profile&quot;,&quot;method&quot;:&quot;GET&quot;,&quot;v&quot;:&quot;acj&quot;},&quot;effects&quot;:{&quot;listeners&quot;:[]},&quot;serverMemo&quot;:{&quot;children&quot;:[],&quot;errors&quot;:[],&quot;htmlHash&quot;:&quot;7b29a39b&quot;,&quot;data&quot;:{&quot;state&quot;:{&quot;id&quot;:1,&quot;name&quot;:&quot;mehedi hasan ahad&quot;,&quot;email&quot;:&quot;mehedihasanahad07@gmail.com&quot;,&quot;email_verified_at&quot;:null,&quot;two_factor_confirmed_at&quot;:null,&quot;current_team_id&quot;:null,&quot;profile_photo_path&quot;:null,&quot;created_at&quot;:&quot;2023-05-30T14:24:48.000000Z&quot;,&quot;updated_at&quot;:&quot;2023-05-30T14:24:48.000000Z&quot;,&quot;profile_photo_url&quot;:&quot;https:\/\/ui-avatars.com\/api\/?name=m+h+a&amp;color=7F9CF5&amp;background=EBF4FF&quot;},&quot;photo&quot;:null,&quot;verificationLinkSent&quot;:false},&quot;dataMeta&quot;:[],&quot;checksum&quot;:&quot;2b5f73ba6acbf192cd41ea2334a513122ab868f1469de4d15ec9c5b6342b35bc&quot;}}" class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1 flex justify-between">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-lg font-medium text-gray-900">Profile Information</h3>

                            <p class="mt-1 text-sm text-gray-600">
                                Update your account&#039;s profile information and email address.
                            </p>
                        </div>

                        <div class="px-4 sm:px-0">

                        </div>
                    </div>

                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <form wire:submit.prevent="updateProfileInformation">
                            <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                                <div class="grid grid-cols-6 gap-6">
                                    <!-- Profile Photo -->

                                    <!-- Name -->
                                    <div class="col-span-6 sm:col-span-4">
                                        <label class="block text-sm font-medium mb-1" for="name">
                                            Name
                                        </label>
                                        <input  class="form-input w-full mt-1 block w-full" id="name" type="text" wire:model.defer="state.name" autocomplete="name">
                                    </div>

                                    <!-- Email -->
                                    <div class="col-span-6 sm:col-span-4">
                                        <label class="block text-sm font-medium mb-1" for="email">
                                            Email
                                        </label>
                                        <input  class="form-input w-full mt-1 block w-full" id="email" type="email" wire:model.defer="state.email">
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                                <div x-data="{ shown: false, timeout: null }"
                                     x-init="window.livewire.find('oDdMtXnlxYbDoz0XnEHt').on('saved', () => { clearTimeout(timeout); shown = true; timeout = setTimeout(() => { shown = false }, 2000);  })"
                                     x-show.transition.out.opacity.duration.1500ms="shown"
                                     x-transition:leave.opacity.duration.1500ms
                                     style="display: none;"
                                     class="text-sm text-gray-600 mr-3">
                                    Saved.
                                </div>

                                <button type="submit" class="btn bg-indigo-500 hover:bg-indigo-600 text-white whitespace-nowrap" wire:loading.attr="disabled" wire:target="photo">
                                    Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Livewire Component wire-end:oDdMtXnlxYbDoz0XnEHt -->
                <div class="hidden sm:block">
                    <div class="py-8">
                        <div class="border-t border-gray-200"></div>
                    </div>
                </div>

                <div class="mt-10 sm:mt-0">
                    <div wire:id="MWk7df0f0OCS3pA1WODy" wire:initial-data="{&quot;fingerprint&quot;:{&quot;id&quot;:&quot;MWk7df0f0OCS3pA1WODy&quot;,&quot;name&quot;:&quot;profile.update-password-form&quot;,&quot;locale&quot;:&quot;en&quot;,&quot;path&quot;:&quot;user\/profile&quot;,&quot;method&quot;:&quot;GET&quot;,&quot;v&quot;:&quot;acj&quot;},&quot;effects&quot;:{&quot;listeners&quot;:[]},&quot;serverMemo&quot;:{&quot;children&quot;:[],&quot;errors&quot;:[],&quot;htmlHash&quot;:&quot;02c94bef&quot;,&quot;data&quot;:{&quot;state&quot;:{&quot;current_password&quot;:&quot;&quot;,&quot;password&quot;:&quot;&quot;,&quot;password_confirmation&quot;:&quot;&quot;}},&quot;dataMeta&quot;:[],&quot;checksum&quot;:&quot;d9fe0ae8be208a7dd1481bd6651cc4f0bbb751fc0c608a2ea783e3ab5f1fb8d9&quot;}}" class="md:grid md:grid-cols-3 md:gap-6">
                        <div class="md:col-span-1 flex justify-between">
                            <div class="px-4 sm:px-0">
                                <h3 class="text-lg font-medium text-gray-900">Update Password</h3>

                                <p class="mt-1 text-sm text-gray-600">
                                    Ensure your account is using a long, random password to stay secure.
                                </p>
                            </div>

                            <div class="px-4 sm:px-0">

                            </div>
                        </div>

                        <div class="mt-5 md:mt-0 md:col-span-2">
                            <form wire:submit.prevent="updatePassword">
                                <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6 sm:col-span-4">
                                            <label class="block text-sm font-medium mb-1" for="current_password">
                                                Current Password
                                            </label>
                                            <input  class="form-input w-full mt-1 block w-full" id="current_password" type="password" wire:model.defer="state.current_password" autocomplete="current-password">
                                        </div>

                                        <div class="col-span-6 sm:col-span-4">
                                            <label class="block text-sm font-medium mb-1" for="password">
                                                New Password
                                            </label>
                                            <input  class="form-input w-full mt-1 block w-full" id="password" type="password" wire:model.defer="state.password" autocomplete="new-password">
                                        </div>

                                        <div class="col-span-6 sm:col-span-4">
                                            <label class="block text-sm font-medium mb-1" for="password_confirmation">
                                                Confirm Password
                                            </label>
                                            <input  class="form-input w-full mt-1 block w-full" id="password_confirmation" type="password" wire:model.defer="state.password_confirmation" autocomplete="new-password">
                                        </div>
                                    </div>
                                </div>

                                <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                                    <div x-data="{ shown: false, timeout: null }"
                                         x-init="window.livewire.find('MWk7df0f0OCS3pA1WODy').on('saved', () => { clearTimeout(timeout); shown = true; timeout = setTimeout(() => { shown = false }, 2000);  })"
                                         x-show.transition.out.opacity.duration.1500ms="shown"
                                         x-transition:leave.opacity.duration.1500ms
                                         style="display: none;"
                                         class="text-sm text-gray-600 mr-3">
                                        Saved.
                                    </div>

                                    <button type="submit" class="btn bg-indigo-500 hover:bg-indigo-600 text-white whitespace-nowrap">
                                        Save
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Livewire Component wire-end:MWk7df0f0OCS3pA1WODy -->                </div>

                <div class="hidden sm:block">
                    <div class="py-8">
                        <div class="border-t border-gray-200"></div>
                    </div>
                </div>

                <div class="mt-10 sm:mt-0">
                    <div wire:id="lpQNAIgn9PBSlplqXfoh" wire:initial-data="{&quot;fingerprint&quot;:{&quot;id&quot;:&quot;lpQNAIgn9PBSlplqXfoh&quot;,&quot;name&quot;:&quot;profile.two-factor-authentication-form&quot;,&quot;locale&quot;:&quot;en&quot;,&quot;path&quot;:&quot;user\/profile&quot;,&quot;method&quot;:&quot;GET&quot;,&quot;v&quot;:&quot;acj&quot;},&quot;effects&quot;:{&quot;listeners&quot;:[]},&quot;serverMemo&quot;:{&quot;children&quot;:[],&quot;errors&quot;:[],&quot;htmlHash&quot;:&quot;663e57ea&quot;,&quot;data&quot;:{&quot;showingQrCode&quot;:false,&quot;showingConfirmation&quot;:false,&quot;showingRecoveryCodes&quot;:false,&quot;code&quot;:null,&quot;confirmingPassword&quot;:false,&quot;confirmableId&quot;:null,&quot;confirmablePassword&quot;:&quot;&quot;},&quot;dataMeta&quot;:[],&quot;checksum&quot;:&quot;bc5dd988026239cd4b681e9b14335bb381a8417eaa55b46979bab1898b0e5899&quot;}}" class="md:grid md:grid-cols-3 md:gap-6">
                        <div class="md:col-span-1 flex justify-between">
                            <div class="px-4 sm:px-0">
                                <h3 class="text-lg font-medium text-gray-900">Two Factor Authentication</h3>

                                <p class="mt-1 text-sm text-gray-600">
                                    Add additional security to your account using two factor authentication.
                                </p>
                            </div>

                            <div class="px-4 sm:px-0">

                            </div>
                        </div>

                        <div class="mt-5 md:mt-0 md:col-span-2">
                            <div class="px-4 py-5 sm:p-6 bg-white shadow sm:rounded-lg">
                                <h3 class="text-lg font-medium text-gray-900">
                                    You have not enabled two factor authentication.
                                </h3>

                                <div class="mt-3 max-w-xl text-sm text-gray-600">
                                    <p>
                                        When two factor authentication is enabled, you will be prompted for a secure, random token during authentication. You may retrieve this token from your phone&#039;s Google Authenticator application.
                                    </p>
                                </div>


                                <div class="mt-5">
                            <span
                                wire:then="enableTwoFactorAuthentication"
                                x-data
                                x-ref="span"
                                x-on:click="$wire.startConfirmingPassword('ab2d1de5297198533ed96f794eb99eac')"
                                x-on:password-confirmed.window="setTimeout(() => $event.detail.id === 'ab2d1de5297198533ed96f794eb99eac' && $refs.span.dispatchEvent(new CustomEvent('then', { bubbles: false })), 250);"
                            >
    <button type="button" class="btn bg-indigo-500 hover:bg-indigo-600 text-white whitespace-nowrap" wire:loading.attr="disabled">
    Enable
</button>
</span>

                                    <div
                                        x-data="{
        show: window.Livewire.find('lpQNAIgn9PBSlplqXfoh').entangle('confirmingPassword').defer,
        focusables() {
            // All focusable element types...
            let selector = 'a, button, input:not([type=\'hidden\']), textarea, select, details, [tabindex]:not([tabindex=\'-1\'])'

            return [...$el.querySelectorAll(selector)]
                // All non-disabled elements...
                .filter(el => ! el.hasAttribute('disabled'))
        },
        firstFocusable() { return this.focusables()[0] },
        lastFocusable() { return this.focusables().slice(-1)[0] },
        nextFocusable() { return this.focusables()[this.nextFocusableIndex()] || this.firstFocusable() },
        prevFocusable() { return this.focusables()[this.prevFocusableIndex()] || this.lastFocusable() },
        nextFocusableIndex() { return (this.focusables().indexOf(document.activeElement) + 1) % (this.focusables().length + 1) },
        prevFocusableIndex() { return Math.max(0, this.focusables().indexOf(document.activeElement)) -1 },
    }"
                                        x-init="$watch('show', value => {
        if (value) {
            document.body.classList.add('overflow-y-hidden');

        } else {
            document.body.classList.remove('overflow-y-hidden');
        }
    })"
                                        x-on:close.stop="show = false"
                                        x-on:keydown.escape.window="show = false"
                                        x-on:keydown.tab.prevent="$event.shiftKey || nextFocusable().focus()"
                                        x-on:keydown.shift.tab.prevent="prevFocusable().focus()"
                                        x-show="show"
                                        id="506a8cb247bad8f18658bdb3f794fabc"
                                        class="jetstream-modal fixed inset-0 overflow-y-auto px-4 py-6 sm:px-0 z-50"
                                        style="display: none;"
                                    >
                                        <div x-show="show" class="fixed inset-0 transition-all" x-on:click="show = false" x-transition:enter="ease-out duration-300"
                                             x-transition:enter-start="opacity-0"
                                             x-transition:enter-end="opacity-100"
                                             x-transition:leave="ease-in duration-200"
                                             x-transition:leave-start="opacity-100"
                                             x-transition:leave-end="opacity-0">
                                            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                                        </div>

                                        <div x-show="show" class="mb-6 bg-white rounded-lg overflow-hidden shadow-xl transition-all sm:w-full sm:max-w-2xl sm:mx-auto"
                                             x-transition:enter="ease-out duration-300"
                                             x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                             x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                             x-transition:leave="ease-in duration-200"
                                             x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                             x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                                            <div class="px-6 py-4">
                                                <div class="text-lg">
                                                    Confirm Password
                                                </div>

                                                <div class="mt-4">
                                                    For your security, please confirm your password to continue.

                                                    <div class="mt-4" x-data="{}" x-on:confirming-password.window="setTimeout(() => $refs.confirmable_password.focus(), 250)">
                                                        <input  class="form-input w-full mt-1 block w-3/4" type="password" placeholder="Password" x-ref="confirmable_password" wire:model.defer="confirmablePassword" wire:keydown.enter="confirmPassword">

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="flex flex-row justify-end px-6 py-4 bg-gray-100 text-right">
                                                <button type="button" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition" wire:click="stopConfirmingPassword" wire:loading.attr="disabled">
                                                    Cancel
                                                </button>

                                                <button type="submit" class="btn bg-indigo-500 hover:bg-indigo-600 text-white whitespace-nowrap ml-3" dusk="confirm-password-button" wire:click="confirmPassword" wire:loading.attr="disabled">
                                                    Confirm
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Livewire Component wire-end:lpQNAIgn9PBSlplqXfoh -->                </div>

                <div class="hidden sm:block">
                    <div class="py-8">
                        <div class="border-t border-gray-200"></div>
                    </div>
                </div>

                <div class="mt-10 sm:mt-0">
                    <div wire:id="D015kvkWOauk2FJKdNYR" wire:initial-data="{&quot;fingerprint&quot;:{&quot;id&quot;:&quot;D015kvkWOauk2FJKdNYR&quot;,&quot;name&quot;:&quot;profile.logout-other-browser-sessions-form&quot;,&quot;locale&quot;:&quot;en&quot;,&quot;path&quot;:&quot;user\/profile&quot;,&quot;method&quot;:&quot;GET&quot;,&quot;v&quot;:&quot;acj&quot;},&quot;effects&quot;:{&quot;listeners&quot;:[]},&quot;serverMemo&quot;:{&quot;children&quot;:[],&quot;errors&quot;:[],&quot;htmlHash&quot;:&quot;27063b12&quot;,&quot;data&quot;:{&quot;confirmingLogout&quot;:false,&quot;password&quot;:&quot;&quot;},&quot;dataMeta&quot;:[],&quot;checksum&quot;:&quot;fe46ce202d1054ac0b406990365d921539d71c7efb6c287a4b3aa9c0c4e09895&quot;}}" class="md:grid md:grid-cols-3 md:gap-6">
                        <div class="md:col-span-1 flex justify-between">
                            <div class="px-4 sm:px-0">
                                <h3 class="text-lg font-medium text-gray-900">Browser Sessions</h3>

                                <p class="mt-1 text-sm text-gray-600">
                                    Manage and log out your active sessions on other browsers and devices.
                                </p>
                            </div>

                            <div class="px-4 sm:px-0">

                            </div>
                        </div>

                        <div class="mt-5 md:mt-0 md:col-span-2">
                            <div class="px-4 py-5 sm:p-6 bg-white shadow sm:rounded-lg">
                                <div class="max-w-xl text-sm text-gray-600">
                                    If necessary, you may log out of all of your other browser sessions across all of your devices. Some of your recent sessions are listed below; however, this list may not be exhaustive. If you feel your account has been compromised, you should also update your password.
                                </div>

                                <div class="mt-5 space-y-6">
                                    <!-- Other Browser Sessions -->
                                    <div class="flex items-center">
                                        <div>
                                            <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" class="w-8 h-8 text-gray-500">
                                                <path d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                            </svg>
                                        </div>

                                        <div class="ml-3">
                                            <div class="text-sm text-gray-600">
                                                Windows - Chrome
                                            </div>

                                            <div>
                                                <div class="text-xs text-gray-500">
                                                    127.0.0.1,

                                                    <span class="text-green-500 font-semibold">This device</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex items-center">
                                        <div>
                                            <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" class="w-8 h-8 text-gray-500">
                                                <path d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                            </svg>
                                        </div>

                                        <div class="ml-3">
                                            <div class="text-sm text-gray-600">
                                                Windows - Chrome
                                            </div>

                                            <div>
                                                <div class="text-xs text-gray-500">
                                                    127.0.0.1,

                                                    Last active 2 days ago
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex items-center">
                                        <div>
                                            <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" class="w-8 h-8 text-gray-500">
                                                <path d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                            </svg>
                                        </div>

                                        <div class="ml-3">
                                            <div class="text-sm text-gray-600">
                                                Windows - Chrome
                                            </div>

                                            <div>
                                                <div class="text-xs text-gray-500">
                                                    127.0.0.1,

                                                    Last active 2 days ago
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex items-center">
                                        <div>
                                            <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" class="w-8 h-8 text-gray-500">
                                                <path d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                            </svg>
                                        </div>

                                        <div class="ml-3">
                                            <div class="text-sm text-gray-600">
                                                Windows - Chrome
                                            </div>

                                            <div>
                                                <div class="text-xs text-gray-500">
                                                    127.0.0.1,

                                                    Last active 2 days ago
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex items-center">
                                        <div>
                                            <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" class="w-8 h-8 text-gray-500">
                                                <path d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                            </svg>
                                        </div>

                                        <div class="ml-3">
                                            <div class="text-sm text-gray-600">
                                                Windows - Chrome
                                            </div>

                                            <div>
                                                <div class="text-xs text-gray-500">
                                                    127.0.0.1,

                                                    Last active 2 days ago
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex items-center">
                                        <div>
                                            <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" class="w-8 h-8 text-gray-500">
                                                <path d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                            </svg>
                                        </div>

                                        <div class="ml-3">
                                            <div class="text-sm text-gray-600">
                                                Windows - Chrome
                                            </div>

                                            <div>
                                                <div class="text-xs text-gray-500">
                                                    127.0.0.1,

                                                    Last active 2 days ago
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex items-center">
                                        <div>
                                            <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" class="w-8 h-8 text-gray-500">
                                                <path d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                            </svg>
                                        </div>

                                        <div class="ml-3">
                                            <div class="text-sm text-gray-600">
                                                Windows - Chrome
                                            </div>

                                            <div>
                                                <div class="text-xs text-gray-500">
                                                    127.0.0.1,

                                                    Last active 2 days ago
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex items-center">
                                        <div>
                                            <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" class="w-8 h-8 text-gray-500">
                                                <path d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                            </svg>
                                        </div>

                                        <div class="ml-3">
                                            <div class="text-sm text-gray-600">
                                                Windows - Chrome
                                            </div>

                                            <div>
                                                <div class="text-xs text-gray-500">
                                                    127.0.0.1,

                                                    Last active 2 days ago
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex items-center mt-5">
                                    <button type="submit" class="btn bg-indigo-500 hover:bg-indigo-600 text-white whitespace-nowrap" wire:click="confirmLogout" wire:loading.attr="disabled">
                                        Log Out Other Browser Sessions
                                    </button>

                                    <div x-data="{ shown: false, timeout: null }"
                                         x-init="window.livewire.find('D015kvkWOauk2FJKdNYR').on('loggedOut', () => { clearTimeout(timeout); shown = true; timeout = setTimeout(() => { shown = false }, 2000);  })"
                                         x-show.transition.out.opacity.duration.1500ms="shown"
                                         x-transition:leave.opacity.duration.1500ms
                                         style="display: none;"
                                         class="text-sm text-gray-600 ml-3">
                                        Done.
                                    </div>
                                </div>

                                <!-- Log Out Other Devices Confirmation Modal -->
                                <div
                                    x-data="{
        show: window.Livewire.find('D015kvkWOauk2FJKdNYR').entangle('confirmingLogout').defer,
        focusables() {
            // All focusable element types...
            let selector = 'a, button, input:not([type=\'hidden\']), textarea, select, details, [tabindex]:not([tabindex=\'-1\'])'

            return [...$el.querySelectorAll(selector)]
                // All non-disabled elements...
                .filter(el => ! el.hasAttribute('disabled'))
        },
        firstFocusable() { return this.focusables()[0] },
        lastFocusable() { return this.focusables().slice(-1)[0] },
        nextFocusable() { return this.focusables()[this.nextFocusableIndex()] || this.firstFocusable() },
        prevFocusable() { return this.focusables()[this.prevFocusableIndex()] || this.lastFocusable() },
        nextFocusableIndex() { return (this.focusables().indexOf(document.activeElement) + 1) % (this.focusables().length + 1) },
        prevFocusableIndex() { return Math.max(0, this.focusables().indexOf(document.activeElement)) -1 },
    }"
                                    x-init="$watch('show', value => {
        if (value) {
            document.body.classList.add('overflow-y-hidden');

        } else {
            document.body.classList.remove('overflow-y-hidden');
        }
    })"
                                    x-on:close.stop="show = false"
                                    x-on:keydown.escape.window="show = false"
                                    x-on:keydown.tab.prevent="$event.shiftKey || nextFocusable().focus()"
                                    x-on:keydown.shift.tab.prevent="prevFocusable().focus()"
                                    x-show="show"
                                    id="7bfef3bbc87b550e8528db202ce06cfb"
                                    class="jetstream-modal fixed inset-0 overflow-y-auto px-4 py-6 sm:px-0 z-50"
                                    style="display: none;"
                                >
                                    <div x-show="show" class="fixed inset-0 transition-all" x-on:click="show = false" x-transition:enter="ease-out duration-300"
                                         x-transition:enter-start="opacity-0"
                                         x-transition:enter-end="opacity-100"
                                         x-transition:leave="ease-in duration-200"
                                         x-transition:leave-start="opacity-100"
                                         x-transition:leave-end="opacity-0">
                                        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                                    </div>

                                    <div x-show="show" class="mb-6 bg-white rounded-lg overflow-hidden shadow-xl transition-all sm:w-full sm:max-w-2xl sm:mx-auto"
                                         x-transition:enter="ease-out duration-300"
                                         x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                         x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                         x-transition:leave="ease-in duration-200"
                                         x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                         x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                                        <div class="px-6 py-4">
                                            <div class="text-lg">
                                                Log Out Other Browser Sessions
                                            </div>

                                            <div class="mt-4">
                                                Please enter your password to confirm you would like to log out of your other browser sessions across all of your devices.

                                                <div class="mt-4" x-data="{}" x-on:confirming-logout-other-browser-sessions.window="setTimeout(() => $refs.password.focus(), 250)">
                                                    <input  class="form-input w-full mt-1 block w-3/4" type="password" placeholder="Password" x-ref="password" wire:model.defer="password" wire:keydown.enter="logoutOtherBrowserSessions">

                                                </div>
                                            </div>
                                        </div>

                                        <div class="flex flex-row justify-end px-6 py-4 bg-gray-100 text-right">
                                            <button type="button" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition" wire:click="$toggle('confirmingLogout')" wire:loading.attr="disabled">
                                                Cancel
                                            </button>

                                            <button type="submit" class="btn bg-indigo-500 hover:bg-indigo-600 text-white whitespace-nowrap ml-3" wire:click="logoutOtherBrowserSessions" wire:loading.attr="disabled">
                                                Log Out Other Browser Sessions
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Livewire Component wire-end:D015kvkWOauk2FJKdNYR -->            </div>

                <div class="hidden sm:block">
                    <div class="py-8">
                        <div class="border-t border-gray-200"></div>
                    </div>
                </div>

                <div class="mt-10 sm:mt-0">
                    <div wire:id="W8iW8PIVHJm6KLXZNrxO" wire:initial-data="{&quot;fingerprint&quot;:{&quot;id&quot;:&quot;W8iW8PIVHJm6KLXZNrxO&quot;,&quot;name&quot;:&quot;profile.delete-user-form&quot;,&quot;locale&quot;:&quot;en&quot;,&quot;path&quot;:&quot;user\/profile&quot;,&quot;method&quot;:&quot;GET&quot;,&quot;v&quot;:&quot;acj&quot;},&quot;effects&quot;:{&quot;listeners&quot;:[]},&quot;serverMemo&quot;:{&quot;children&quot;:[],&quot;errors&quot;:[],&quot;htmlHash&quot;:&quot;5ac88cdb&quot;,&quot;data&quot;:{&quot;confirmingUserDeletion&quot;:false,&quot;password&quot;:&quot;&quot;},&quot;dataMeta&quot;:[],&quot;checksum&quot;:&quot;2a984f4a32ff819fcfb875a19436103b16d297317fe7a65aae73871803263eec&quot;}}" class="md:grid md:grid-cols-3 md:gap-6">
                        <div class="md:col-span-1 flex justify-between">
                            <div class="px-4 sm:px-0">
                                <h3 class="text-lg font-medium text-gray-900">Delete Account</h3>

                                <p class="mt-1 text-sm text-gray-600">
                                    Permanently delete your account.
                                </p>
                            </div>

                            <div class="px-4 sm:px-0">

                            </div>
                        </div>

                        <div class="mt-5 md:mt-0 md:col-span-2">
                            <div class="px-4 py-5 sm:p-6 bg-white shadow sm:rounded-lg">
                                <div class="max-w-xl text-sm text-gray-600">
                                    Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.
                                </div>

                                <div class="mt-5">
                                    <button type="button" class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 active:bg-red-600 disabled:opacity-25 transition" wire:click="confirmUserDeletion" wire:loading.attr="disabled">
                                        Delete Account
                                    </button>
                                </div>

                                <!-- Delete User Confirmation Modal -->
                                <div
                                    x-data="{
        show: window.Livewire.find('W8iW8PIVHJm6KLXZNrxO').entangle('confirmingUserDeletion').defer,
        focusables() {
            // All focusable element types...
            let selector = 'a, button, input:not([type=\'hidden\']), textarea, select, details, [tabindex]:not([tabindex=\'-1\'])'

            return [...$el.querySelectorAll(selector)]
                // All non-disabled elements...
                .filter(el => ! el.hasAttribute('disabled'))
        },
        firstFocusable() { return this.focusables()[0] },
        lastFocusable() { return this.focusables().slice(-1)[0] },
        nextFocusable() { return this.focusables()[this.nextFocusableIndex()] || this.firstFocusable() },
        prevFocusable() { return this.focusables()[this.prevFocusableIndex()] || this.lastFocusable() },
        nextFocusableIndex() { return (this.focusables().indexOf(document.activeElement) + 1) % (this.focusables().length + 1) },
        prevFocusableIndex() { return Math.max(0, this.focusables().indexOf(document.activeElement)) -1 },
    }"
                                    x-init="$watch('show', value => {
        if (value) {
            document.body.classList.add('overflow-y-hidden');

        } else {
            document.body.classList.remove('overflow-y-hidden');
        }
    })"
                                    x-on:close.stop="show = false"
                                    x-on:keydown.escape.window="show = false"
                                    x-on:keydown.tab.prevent="$event.shiftKey || nextFocusable().focus()"
                                    x-on:keydown.shift.tab.prevent="prevFocusable().focus()"
                                    x-show="show"
                                    id="36ac91a8122577c7b197539ebb1a5123"
                                    class="jetstream-modal fixed inset-0 overflow-y-auto px-4 py-6 sm:px-0 z-50"
                                    style="display: none;"
                                >
                                    <div x-show="show" class="fixed inset-0 transition-all" x-on:click="show = false" x-transition:enter="ease-out duration-300"
                                         x-transition:enter-start="opacity-0"
                                         x-transition:enter-end="opacity-100"
                                         x-transition:leave="ease-in duration-200"
                                         x-transition:leave-start="opacity-100"
                                         x-transition:leave-end="opacity-0">
                                        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                                    </div>

                                    <div x-show="show" class="mb-6 bg-white rounded-lg overflow-hidden shadow-xl transition-all sm:w-full sm:max-w-2xl sm:mx-auto"
                                         x-transition:enter="ease-out duration-300"
                                         x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                         x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                         x-transition:leave="ease-in duration-200"
                                         x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                         x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                                        <div class="px-6 py-4">
                                            <div class="text-lg">
                                                Delete Account
                                            </div>

                                            <div class="mt-4">
                                                Are you sure you want to delete your account? Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.

                                                <div class="mt-4" x-data="{}" x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
                                                    <input  class="form-input w-full mt-1 block w-3/4" type="password" placeholder="Password" x-ref="password" wire:model.defer="password" wire:keydown.enter="deleteUser">

                                                </div>
                                            </div>
                                        </div>

                                        <div class="flex flex-row justify-end px-6 py-4 bg-gray-100 text-right">
                                            <button type="button" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition" wire:click="$toggle('confirmingUserDeletion')" wire:loading.attr="disabled">
                                                Cancel
                                            </button>

                                            <button type="button" class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 active:bg-red-600 disabled:opacity-25 transition ml-3" wire:click="deleteUser" wire:loading.attr="disabled">
                                                Delete Account
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Livewire Component wire-end:W8iW8PIVHJm6KLXZNrxO -->                </div>
            </div>
        </div>
@endsection
