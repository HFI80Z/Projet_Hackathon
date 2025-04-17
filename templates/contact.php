<?php ob_start(); ?>

<div class="min-h-screen bg-white">
    <!-- Hero Section avec fond bleu -->
    <div class="relative py-20">
        <div class="absolute inset-0"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="font-extrabold tracking-tight sm:text-5xl md:text-6xl block text-indigo-600 xl:inline">
                    Contactez notre équipe
                </h1>
                <p class="mt-3 max-w-md mx-auto text-lg text-gray-500 sm:text-xl md:mt-5 md:max-w-3xl">
                    Nous sommes là pour répondre à toutes vos questions en moins de 24h
                </p>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Contact Info Card -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200">
                <div class="p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Nos coordonnées</h2>
                    
                    <div class="space-y-6">
                        <!-- Address -->
                        <div class="flex items-start">
                            <div class="flex-shrink-0 h-12 w-12 rounded-full bg-blue-100 flex items-center justify-center text-blue-600">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-medium text-gray-900">Notre adresse</h3>
                                <p class="mt-1 text-gray-500">123 Avenue des Champs-Élysées<br>75008 Paris, France</p>
                            </div>
                        </div>
                        
                        <!-- Phone -->
                        <div class="flex items-start">
                            <div class="flex-shrink-0 h-12 w-12 rounded-full bg-blue-100 flex items-center justify-center text-blue-600">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-medium text-gray-900">Téléphone</h3>
                                <p class="mt-1 text-gray-500">+33 1 23 45 67 89</p>
                                <p class="mt-1 text-sm text-gray-500">Lundi-Vendredi, 9h-18h</p>
                            </div>
                        </div>
                        
                        <!-- Email -->
                        <div class="flex items-start">
                            <div class="flex-shrink-0 h-12 w-12 rounded-full bg-blue-100 flex items-center justify-center text-blue-600">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-medium text-gray-900">Email</h3>
                                <p class="mt-1 text-gray-500">contact@efreibnb.com</p>
                                <p class="mt-1 text-sm text-gray-500">Réponse sous 24h</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Social Media -->
                    <div class="mt-8">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Suivez-nous</h3>
                        <div class="flex space-x-4">
                            <a href="https://www.facebook.com/" target="_blank" class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 hover:bg-blue-200 transition">
                                <span class="sr-only">Facebook</span>
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"/>
                                </svg>
                            </a>
                            <a href="https://x.com/home" target="_blank" class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 hover:bg-blue-200 transition">
                                <span class="sr-only">Twitter</span>
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/>
                                </svg>
                            </a>
                            <a href="https://www.instagram.com/" target="_blank" class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 hover:bg-blue-200 transition">
                                <span class="sr-only">Instagram</span>
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd"/>
                                </svg>
                            </a>
                            <a href="https://www.linkedin.com/login/fr" target="_blank" class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 hover:bg-blue-200 transition">
                                <span class="sr-only">LinkedIn</span>
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Map -->
                <div class="h-64 bg-gray-200">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2624.9916256937595!2d2.292292615509614!3d48.85837007928746!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e2964e34e2d%3A0x8ddca9ee380ef7e0!2sTour%20Eiffel!5e0!3m2!1sfr!2sfr!4v1623258136845!5m2!1sfr!2sfr" 
                        width="100%" 
                        height="100%" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy"
                        class="filter grayscale(50%) contrast(1.2)">
                    </iframe>
                </div>
            </div>

            <!-- Contact Form Card -->
            <div class="lg:col-span-2 bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200">
                <div class="p-8 sm:p-10">
                    <h2 class="text-2xl font-bold text-gray-900 mb-2">Envoyez-nous un message</h2>
                    <p class="text-gray-500 mb-8">Remplissez ce formulaire et nous vous répondrons dès que possible</p>
                    
                    <form action="#" method="post" class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- First Name -->
                            <div>
                                <label for="prenom" class="block text-sm font-medium text-gray-700 mb-1">Prénom</label>
                                <input type="text" id="prenom" name="prenom" required
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150"
                                    placeholder="Votre prénom">
                            </div>
                            
                            <!-- Last Name -->
                            <div>
                                <label for="nom" class="block text-sm font-medium text-gray-700 mb-1">Nom</label>
                                <input type="text" id="nom" name="nom" required
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150"
                                    placeholder="Votre nom">
                            </div>
                            
                            <!-- Email -->
                            <div class="md:col-span-2">
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                                <input type="email" id="email" name="email" required
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150"
                                    placeholder="email@exemple.com">
                            </div>
                            
                            <!-- Phone -->
                            <div class="md:col-span-2">
                                <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Téléphone (optionnel)</label>
                                <input type="tel" id="phone" name="phone"
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150"
                                    placeholder="+33 6 12 34 56 78">
                            </div>
                            
                            <!-- Subject -->
                            <div class="md:col-span-2">
                                <label for="subject" class="block text-sm font-medium text-gray-700 mb-1">Sujet</label>
                                <select id="subject" name="subject" required
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150">
                                    <option value="" disabled selected>Sélectionnez un sujet</option>
                                    <option value="support">Support technique</option>
                                    <option value="sales">Demande commerciale</option>
                                    <option value="partnership">Partenariat</option>
                                    <option value="other">Autre demande</option>
                                </select>
                            </div>
                            
                            <!-- Message -->
                            <div class="md:col-span-2">
                                <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Message</label>
                                <textarea id="message" name="message" rows="5" required
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150"
                                    placeholder="Décrivez votre demande en détail..."></textarea>
                            </div>
                            
                            <!-- File Upload -->
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Joindre un fichier (optionnel)</label>
                                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                    <div class="space-y-1 text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        <div class="flex text-sm text-gray-600">
                                            <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                                <span>Uploader un fichier</span>
                                                <input id="file-upload" name="file-upload" type="file" class="sr-only">
                                            </label>
                                            <p class="pl-1">ou glisser-déposer</p>
                                        </div>
                                        <p class="text-xs text-gray-500">PNG, JPG, PDF jusqu'à 10MB</p>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Newsletter -->
                            <div class="md:col-span-2 flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="newsletter" name="newsletter" type="checkbox" 
                                        class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded">
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="newsletter" class="font-medium text-gray-700">S'abonner à notre newsletter</label>
                                    <p class="text-gray-500">Recevez nos dernières actualités et offres spéciales</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Submit Button -->
                        <div class="pt-4">
                            <button type="submit" 
                                class="w-full flex justify-center items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150">
                                <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"/>
                                </svg>
                                Envoyer le message
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- FAQ Section -->
        <div class="mt-16 bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200">
            <div class="p-8 sm:p-10">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Questions fréquentes</h2>
                
                <div class="space-y-4">
                    <!-- FAQ Item 1 -->
                    <div x-data="{ open: false }" class="border-b border-gray-200 pb-4">
                        <button @click="open = !open" class="flex justify-between items-center w-full text-left text-gray-900">
                            <span class="font-medium">Comment puis-je suivre ma demande ?</span>
                            <svg :class="{ 'transform rotate-180': open }" class="h-5 w-5 text-gray-500 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="mt-2 text-gray-600">
                            <p>Vous recevrez un email de confirmation avec un numéro de suivi dès que nous aurons traité votre demande. Vous pouvez également nous contacter par téléphone pour avoir des nouvelles.</p>
                        </div>
                    </div>
                    
                    <!-- FAQ Item 2 -->
                    <div x-data="{ open: false }" class="border-b border-gray-200 pb-4">
                        <button @click="open = !open" class="flex justify-between items-center w-full text-left text-gray-900">
                            <span class="font-medium">Quels sont vos horaires d'ouverture ?</span>
                            <svg :class="{ 'transform rotate-180': open }" class="h-5 w-5 text-gray-500 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="mt-2 text-gray-600">
                            <p>Notre équipe est disponible du lundi au vendredi de 9h à 18h. En dehors de ces horaires, vous pouvez nous laisser un message et nous vous répondrons dès la réouverture.</p>
                        </div>
                    </div>
                    
                    <!-- FAQ Item 3 -->
                    <div x-data="{ open: false }" class="border-b border-gray-200 pb-4">
                        <button @click="open = !open" class="flex justify-between items-center w-full text-left text-gray-900">
                            <span class="font-medium">Puis-je venir directement sur place ?</span>
                            <svg :class="{ 'transform rotate-180': open }" class="h-5 w-5 text-gray-500 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="mt-2 text-gray-600">
                            <p>Oui, notre bureau est ouvert au public sur rendez-vous. Merci de nous contacter au préalable pour convenir d'un créneau horaire.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Team Preview -->
        <div class="mt-16">
            <h2 class="text-2xl font-bold text-gray-900 mb-8 text-center">Notre équipe à votre service</h2>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Team Member 1 -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden text-center border border-gray-200">
                    <div class="h-48 bg-blue-100 flex items-center justify-center">
                        <svg class="h-24 w-24 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="p-6">
                        <h3 class="text-lg font-medium text-gray-900">William Lin</h3>
                        <p class="text-blue-600">Service client</p>
                        <p class="mt-2 text-gray-500 text-sm">William répond à toutes vos questions avec le sourire</p>
                    </div>
                </div>
                
                <!-- Team Member 2 -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden text-center border border-gray-200">
                    <div class="h-48 bg-blue-100 flex items-center justify-center">
                        <svg class="h-24 w-24 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="p-6">
                        <h3 class="text-lg font-medium text-gray-900">Quentin Leboucher</h3>
                        <p class="text-blue-600">Support technique</p>
                        <p class="mt-2 text-gray-500 text-sm">Expert en résolution de problèmes complexes</p>
                    </div>
                </div>
                
                <!-- Team Member 3 -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden text-center border border-gray-200">
                    <div class="h-48 bg-blue-100 flex items-center justify-center">
                        <svg class="h-24 w-24 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="p-6">
                        <h3 class="text-lg font-medium text-gray-900">Esteban Lory</h3>
                        <p class="text-blue-600">Responsable commerciale</p>
                        <p class="mt-2 text-gray-500 text-sm">Vous conseille pour trouver la meilleure solution</p>
                    </div>
                </div>
                
                <!-- Team Member 4 -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden text-center border border-gray-200">
                    <div class="h-48 bg-blue-100 flex items-center justify-center">
                        <svg class="h-24 w-24 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="p-6">
                        <h3 class="text-lg font-medium text-gray-900">Anthony Nguyen</h3>
                        <p class="text-blue-600">Directeur général</p>
                        <p class="mt-2 text-gray-500 text-sm">Garant de la qualité de notre service</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
require __DIR__ . '/layout.php';