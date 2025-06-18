<footer class="bg-onyx mt-20 pb-24 text-timber">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
      <div class="grid grid-cols-1 md:grid-cols-12 gap-8">

          <div class="md:col-span-4 lg:col-span-5">
              <x-application-logo></x-application-logo>
              <p class="text-myrtle dark:text-gold mt-6 max-w-xs">Artisanally roasted coffee from the finest Indonesian estates, delivered fresh to you.</p>
          </div>

          <div class="md:col-span-8 lg:col-span-7 grid grid-cols-2 sm:grid-cols-4 gap-8 text-sm">
              <div>
                <h3 class="font-semibold text-white mb-3 uppercase tracking-wider">Navigasi</h3>
                <ul class="space-y-2">
                  <li><a href="#" class="hover:text-gold transition-colors duration-200">Home</a></li>
                  <li><a href="#" class="hover:text-gold transition-colors duration-200">Tentang</a></li>
                  <li><a href="#" class="hover:text-gold transition-colors duration-200">Katalog</a></li>
                </ul>
              </div>
              <div>
                <h3 class="font-semibold text-white mb-3 uppercase tracking-wider">Produk</h3>
                <ul class="space-y-2">
                  <li><a href="#" class="hover:text-gold transition-colors duration-200">Biji Kopi</a></li>
                  <li><a href="#" class="hover:text-gold transition-colors duration-200">Kopi Bubuk</a></li>
                  <li><a href="#" class="hover:text-gold transition-colors duration-200">Peralatan</a></li>
                </ul>
              </div>
              <div>
                <h3 class="font-semibold text-white mb-3 uppercase tracking-wider">Kontak</h3>
                <ul class="space-y-2">
                  <li><a href="#" class="hover:text-gold transition-colors duration-200">WhatsApp</a></li>
                  <li><a href="#" class="hover:text-gold transition-colors duration-200">Email</a></li>
                </ul>
              </div>
              <div>
                <h3 class="font-semibold text-white mb-3 uppercase tracking-wider">Legal</h3>
                <ul class="space-y-2">
                  <li><a href="#" class="hover:text-gold transition-colors duration-200">Kebijakan Privasi</a></li>
                  <li><a href="#" class="hover:text-gold transition-colors duration-200">Syarat & Ketentuan</a></li>
                </ul>
              </div>
          </div>
      </div>

      <div class="mt-10 pt-8 border-t border-myrtle  flex flex-col sm:flex-row justify-between items-center">
          <p class="text-sm text-myrtle dark:text-gold">&copy; {{ date('Y') }} SpillDB. All Rights Reserved.</p>
          
          <div class="flex space-x-5 mt-4 sm:mt-0">
              <a href="#" class="text-timber hover:text-gold transition-colors duration-200">
                  <span class="sr-only">X (Twitter)</span>
                  <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                      <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                  </svg>
              </a>
              <a href="#" class="text-timber hover:text-gold transition-colors duration-200">
                  <span class="sr-only">Instagram</span>
                  <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                      <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.024.06 1.378.06 3.808s-.012 2.784-.06 3.808c-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.024.048-1.378.06-3.808.06s-2.784-.012-3.808-.06c-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.048-1.024-.06-1.378-.06-3.808s.012-2.784.06-3.808c.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 016.08 2.525c.636-.247 1.363-.416 2.427-.465C9.53 2.013 9.884 2 12.315 2zm-1.043 11.437a4.722 4.722 0 108.932 4.722 4.722 4.722 0 00-8.932-4.722zm10.294-8.814a1.232 1.232 0 10-2.463 0 1.232 1.232 0 002.463 0z" clip-rule="evenodd" />
                  </svg>
              </a>
              <a href="#" class="text-timber hover:text-gold transition-colors duration-200">
                  <span class="sr-only">Facebook</span>
                  <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                      <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                  </svg>
              </a>
          </div>
      </div>
  </div>
</footer>
