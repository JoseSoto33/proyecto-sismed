PGDMP     +        
            v            sismed    10.4    10.4 F    �           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                       false            �           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                       false            �           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                       false            ~          0    16394    accion 
   TABLE DATA                     public       postgres    false    196   	/       �          0    17370    alimentos_recomendaciones 
   TABLE DATA                     public       postgres    false    245   #/       �          0    16399    citas 
   TABLE DATA                     public       postgres    false    198   �/       �          0    16409    consulta 
   TABLE DATA                     public       postgres    false    200   21       �          0    16413    consulta_curativa 
   TABLE DATA                     public       postgres    false    201   L1       �          0    16422    consulta_preventiva 
   TABLE DATA                     public       postgres    false    203   42       �          0    17379    cuadro_recomendaciones 
   TABLE DATA                     public       postgres    false    247   �3       �          0    16430    esquema 
   TABLE DATA                     public       postgres    false    204   r8       �          0    16435    evento 
   TABLE DATA                     public       postgres    false    206   B;       �          0    16443    examen_fisico 
   TABLE DATA                     public       postgres    false    208   �=       �          0    16448    historia_clinica 
   TABLE DATA                     public       postgres    false    210   >       �          0    16452    historia_medicina 
   TABLE DATA                     public       postgres    false    211   (>       �          0    16459    historia_nutricion 
   TABLE DATA                     public       postgres    false    212   �>       �          0    16463    lista_equivalente 
   TABLE DATA                     public       postgres    false    213   �>       �          0    16468    lista_medida 
   TABLE DATA                     public       postgres    false    215   �?       �          0    16474    lista_racion 
   TABLE DATA                     public       postgres    false    216   P@       �          0    17421    lista_racion_sustituto 
   TABLE DATA                     public       postgres    false    253   �E       �          0    17409    lista_recomendaciones 
   TABLE DATA                     public       postgres    false    251   �E       �          0    16487    lista_sustitutos 
   TABLE DATA                     public       postgres    false    218   H       �          0    16493    lote_insumo 
   TABLE DATA                     public       postgres    false    220   �H       �          0    17507    menu_comedor 
   TABLE DATA                     public       postgres    false    259   �I       �          0    17489    menu_semanal 
   TABLE DATA                     public       postgres    false    257   pJ       �          0    16503    noticia 
   TABLE DATA                     public       postgres    false    223   �J       �          0    16518    paciente 
   TABLE DATA                     public       postgres    false    226   �L       �          0    16524 	   patologia 
   TABLE DATA                     public       postgres    false    227   :N       �          0    16512    persona 
   TABLE DATA                     public       postgres    false    225   �N       �          0    16532    plan_alimenticio 
   TABLE DATA                     public       postgres    false    230    O       �          0    17395    recomendaciones 
   TABLE DATA                     public       postgres    false    249   O       �          0    17450    relacion_recomendaciones_lista 
   TABLE DATA                     public       postgres    false    255   �O       �          0    16541    sesion 
   TABLE DATA                     public       postgres    false    232   (Q       �          0    16546    stock 
   TABLE DATA                     public       postgres    false    234   �U       �          0    17525    turno_equivalente 
   TABLE DATA                     public       postgres    false    261   aW       �          0    16555    usuario 
   TABLE DATA                     public       postgres    false    236   {W       �          0    16565    utiliza 
   TABLE DATA                     public       postgres    false    237   �Z       �          0    16574    vacuna 
   TABLE DATA                     public       postgres    false    239   [       �          0    16578    vacuna_aplicada 
   TABLE DATA                     public       postgres    false    240   �[       �          0    16584    vacuna_patologia 
   TABLE DATA                     public       postgres    false    242   \       �           0    0    acciones_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.acciones_id_seq', 1, false);
            public       postgres    false    197            �           0    0     alimentos_recomendaciones_id_seq    SEQUENCE SET     N   SELECT pg_catalog.setval('public.alimentos_recomendaciones_id_seq', 7, true);
            public       postgres    false    246            �           0    0    citas_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('public.citas_id_seq', 14, true);
            public       postgres    false    199            �           0    0    consulta_id_seq    SEQUENCE SET     =   SELECT pg_catalog.setval('public.consulta_id_seq', 6, true);
            public       postgres    false    202            �           0    0    cuadro_recomendaciones_id_seq    SEQUENCE SET     L   SELECT pg_catalog.setval('public.cuadro_recomendaciones_id_seq', 47, true);
            public       postgres    false    248            �           0    0    esquema_id_seq    SEQUENCE SET     <   SELECT pg_catalog.setval('public.esquema_id_seq', 4, true);
            public       postgres    false    205            �           0    0    evento_id_seq    SEQUENCE SET     <   SELECT pg_catalog.setval('public.evento_id_seq', 22, true);
            public       postgres    false    207            �           0    0    examen_fisico_id_seq    SEQUENCE SET     C   SELECT pg_catalog.setval('public.examen_fisico_id_seq', 1, false);
            public       postgres    false    209            �           0    0    lisa_racion_sustituto_id_seq    SEQUENCE SET     K   SELECT pg_catalog.setval('public.lisa_racion_sustituto_id_seq', 49, true);
            public       postgres    false    254            �           0    0    lista_equivalente_id_seq    SEQUENCE SET     G   SELECT pg_catalog.setval('public.lista_equivalente_id_seq', 1, false);
            public       postgres    false    214            �           0    0    lista_racion_id_seq    SEQUENCE SET     B   SELECT pg_catalog.setval('public.lista_racion_id_seq', 43, true);
            public       postgres    false    217            �           0    0    lista_recomendaciones_id_seq    SEQUENCE SET     K   SELECT pg_catalog.setval('public.lista_recomendaciones_id_seq', 13, true);
            public       postgres    false    252            �           0    0    lista_sustitutos_id_seq    SEQUENCE SET     F   SELECT pg_catalog.setval('public.lista_sustitutos_id_seq', 12, true);
            public       postgres    false    219            �           0    0    lote_insumo_id_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.lote_insumo_id_seq', 8, true);
            public       postgres    false    221            �           0    0    lsta_medida_id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.lsta_medida_id_seq', 13, true);
            public       postgres    false    222            �           0    0    menu_comedor_id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.menu_comedor_id_seq', 7, true);
            public       postgres    false    260            �           0    0    menu_semanal_id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.menu_semanal_id_seq', 3, true);
            public       postgres    false    258            �           0    0    noticia_id_seq    SEQUENCE SET     <   SELECT pg_catalog.setval('public.noticia_id_seq', 9, true);
            public       postgres    false    224            �           0    0    patologia_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.patologia_id_seq', 3, true);
            public       postgres    false    228            �           0    0    persona_id_seq    SEQUENCE SET     =   SELECT pg_catalog.setval('public.persona_id_seq', 17, true);
            public       postgres    false    229                        0    0    plan_alimenticio_id_seq    SEQUENCE SET     F   SELECT pg_catalog.setval('public.plan_alimenticio_id_seq', 22, true);
            public       postgres    false    231                       0    0    recomendaciones_id_seq    SEQUENCE SET     D   SELECT pg_catalog.setval('public.recomendaciones_id_seq', 6, true);
            public       postgres    false    250                       0    0    recomendaciones_lista_id_seq    SEQUENCE SET     K   SELECT pg_catalog.setval('public.recomendaciones_lista_id_seq', 49, true);
            public       postgres    false    256                       0    0    sesion_id_seq    SEQUENCE SET     <   SELECT pg_catalog.setval('public.sesion_id_seq', 84, true);
            public       postgres    false    233                       0    0    stock_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('public.stock_id_seq', 18, true);
            public       postgres    false    235                       0    0    turno_equivalente_id_seq    SEQUENCE SET     G   SELECT pg_catalog.setval('public.turno_equivalente_id_seq', 35, true);
            public       postgres    false    262                       0    0    utiliza_id_seq    SEQUENCE SET     =   SELECT pg_catalog.setval('public.utiliza_id_seq', 1, false);
            public       postgres    false    238                       0    0    vacuna_aplicada_id_seq    SEQUENCE SET     E   SELECT pg_catalog.setval('public.vacuna_aplicada_id_seq', 1, false);
            public       postgres    false    244                       0    0    vacuna_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('public.vacuna_id_seq', 6, true);
            public       postgres    false    241            	           0    0    vacuna_patologia_id_seq    SEQUENCE SET     E   SELECT pg_catalog.setval('public.vacuna_patologia_id_seq', 4, true);
            public       postgres    false    243            ~   
   x���          �   �   x���v
Q���W((M��L�K���M�+�/�/JM�2S�3��R��}B]�4u���KR��K,V״��$�#�1ΉEI��)E�@�d�d4�#������ �q+*-��S��E��a4�)5)3�3́f��A��� 铢T      �   W  x����O�0ǟ���lK��~��(FB�@Ma���x��ȿ��uӀ���K�������;���)�����s�p��=]�f�]P�g���:z�H��U6]�\�-c��֗u�R�!�1�1A�E.D�s�;��M���uj!l�]B}/ �f��|��7+�rÍ���.�|S�&�0�l�6�M$̦�&Y�~x�]�r�e�,����˫��/Xb!V]��e�����ۛ^<�Y���08aMqL�G&0� @X�8T���8�*�Y jظ���щhV7�kX��xۥH�����D�F@��%?R'���ǄA�]\��o��D�ڦ������t���M5-!;��n�a��      �   
   x���          �   �   x���MK�@���sK�6d6�i�Ih*���^e�d!d�~�����z�0�y���>mj�h��	�0NZe��.L�^U�����CwnN�)���R�c���%`U�}-�L`�ƨ��Ǫ�n�?w]�3�.�F���:�7+Zl��/���-�'XHi�=��қ���� � �Z���mVV⊀��y�������w=��V{���z^g&�7�g�      �   H  x��Q�N�0��w+Hm��W&D3D
�D[V�&�������S?!?��&l,�q����9i�I�����5�f_��)�hL��k��
͎^�]���pț��(��������ySK%!�@��.x�.�,�$�	%�Z�'�r������T o?JVH8PA�F�F�%)��NI�gz�$�d�6���!��Br��ΩQ�n��wc�h��Z�"zL��7!t�_�{��	�}�®��ܰ�,�d� ڳ5� �{[E4���p����$�[p�88�2��N�?����o7MQ;�_ѓ��/ �][\�^To�˃�����|��      �   �  x�ՙ�n�6����%�`t����`ڦH�t&3��bd��RR �m��"����������KʉS��Aч��}:RN�޾~s�N�.~eU;Q��rk~���R蜸4Z�����w�߲�8b����65��O|�nu�*�5E�4�9Y��s��a�Ԭ�Ba��9�&b�V\�C	>̰�)Lk��%����ݢ��R1QN�F�^��*%�F%Y�N�A�-EM��Pcjg/�X������?�='ͤnDa	����܇5��Zؼ�*g-�*�h'tB�"x H������Zh����n1�ޞ[��Z�rEu#����3�>p��mE��B��D��ƯR����v7��c���?p$�
-�H�r_��%qԔf�e���	�ni\L�|,V/�����.]�Բ!�e��(�"؊؜4M������2��Am�6��3x��\y6X����o�2��2��]2�ڇ��t�-��Z�.��ܒW��m� ��*���e	ypŠQ���ƟY���H����}�NfAN� �%��ڵ(�}�A9�Fx�"r2�k_��\���~Ȧ�a�k�Խ��ս�d�!n~�+t߫N�o�A�(H��ɇV���&bMw�Z沭�N�Wb�j@+n��-�:�V��p�ūfX�C��s��@*Q]���
�
F������Bۏ���2uA�{C�z�?aG�ň��E��+;�t<(�� E�2�^A��>	�8��(;�i�AN?�q(�cG�3��ٻ�So,��qv����h���*&�&�H�@�@�f�� ?P�V*%T�1D���:�w�O���|4��Mi0���M_9B���J^|����4�I�M�i(��$x�|�)\E�4	�u�n��P\'٦p���:�/�~<���������1΂|��F�>��b�6o�k-��R3����5q�<	����8����!�t�[�3]��YA�tY(��xS��BA�&��\��l���o�ϔ�զ��}�Q'��1M7O�7����\=�޵��t�1[aDI�k���hƪQ0m�7A�y5!�J�63'��ШB{��ݾMc�R�2��/���>��p��?k���#�)�4�ug�C;3K���0]�/�Ճ�!�:.Tq�^>~���}lS��q@��v�~Xgg٪�]AmjT�°���~qM�k���6b�~����6`v�5��W��;�ͼ˾[�:gg����Z      �   �  x��W=o�0��+nS�>(�F'1Pm�IwFb��RR���n;t(Щc��z�hK�l�r؋q4y|���=�]�a~�xY�G���/%K(|�~x�-��!#p��s��7n�@���o~�_������BФ̃2�W��e^K~�� ��f1d"J� �.�#2�)LLPy�r힥�Jc�b&,�K���ub��W�������q��b~@Ԯ��F�V�`|d9���UȍmlF��Ǹ�@�)��`�	R~�����(�*7�_ʳ#��V	�?E�ޯ�L۲�C�X�l���=+42���n��� D�X�Ƕ�#	��&�dh82�I��U�-�U���J��d�+MFt6��l�"'��`��b(�8]^�A�n��8��5��!]B!�	q05�ow�ٔ�;A�zW�G���B�=AHg�4 ��!ݼ�����a�b�Q��C���:��@5��C��V�;�.��,�?R�C��W�����O��apF"���Ъ=o��e ��k
�E?�؟Y�|�5*eo���R^����΃�����ue���+��~ ~�L�,�����4��j!�I���8�&o4C�T@���n-f)^U�0���}e��olٍ0�hc�
Tb��B�r\�R�/�)�J�M�C)���?q%���[�94��tNϛM���>�ߌ��[������_\���%i      �   �  x��U�n�0}�W��Mb�mBڰ�U�-K7(��9���9$��~�>��7�@�����c���s�u��?z��	$���匯c0�6������F���1Pk-�>%a����btI
C� ,�:=�z0�,c�
�'�����r@]E��`Y0�ʊ�tM KA��;Z�k���UU�J�`�ׁg2�>�P~�W
6`�����k���fuϤ�����U� ���,o��c���H�ZAx�ͬ�E-W�qeW�qu���d�:�VM�:�'�"��q�+���CWs:uc��}���[��bX��r�3��~t����ر!q���)\��b7�P2�4�	�vb���J5X���ހ��<��(܏�����w��l|��9�C/-i�N��3z�̆ʈ�B0Z�j�8�=rI09��_N�ެo��î\��g��-U�b�@��,�J��k&d���(c�KaQ.�"H�|ia���$�ǲ�ڕ�21˃S\T�Wn��u.u�:���c��ce9��u���wr0�RpV7�Y��|>����\�|wD;����s���1\�M�g\L��4S�1��@i *��3�(�I���h�^�n�hH�(�wxY/�{��|_��'?�[�Nw9��6�F�M�4 ?]�X�Vu���PLy      �   
   x���          �   
   x���          �   �   x���v
Q���W((M��L���,.�/�L��MM�L��KTs�	uV�0�QP7204�50�5�P0��20�26�3�0WJ�������8~�y�y��LMk.OR�3A��������R���b�������9n븸 ��<�      �   
   x���          �   �   x��ұ
�0F�Oq�*�6IS+NR�VWi%C �b�����v͵'��zϣwϭw�ix���~������t�5�Ćr����13��ѕ�S�Iؕ�`�YQJ_�H�p�H��W���D'��3ޥ�Y����"��ߢ�˲?+�      �   �   x����
�@��W1;"�VBX����3Ԁ�㦻����ڲ�=�g�~~ya�� >��I2��3U��R(�ٟ������&���=\[������Ь�v�!/Ij���FIa��Id�gIqst�L��2�@Ãd��)�!��S�AQ|�1I��y�UC!H+p���������;��[��\�      �   {  x���Mr7��>��T�R$����J��I�b1�r6�&�P0�3�X�E��x��x�t7�����V��x�F|{vq�qQ�=[|(�n��Ż���Cqyx���E���E��Ě�-L�jo[z����볷�S`� ���I��*Q�ħ��]jwQDPb�H�!Td��)6u�7�����kj�䁐�-U�3�cS� :�2�x�;(|EG�r/m���e�ء��e�~7�;�+[�f�BDWw(�:"OK�{@aqՑ]F���[E�q�l�L{��p�Eܕ�	e�cG��-�h��319��a��m��`�O�ˎC)�s>*��] ���n�S�5l��������i���5�x쌖�b�s���s%��vDK1չ�lh��эX����W�EC.�P�w�Z�j����b���b3��>�Xa.g�Z��q{�$x�J1�"V�Z�?]���SU)���k>�HΫܗ�D���O
��#�5iQ��$S��)˥�3t�*��m>HA"�G"��7�m�Y!��JS���:@
�W]�� .�{��o���b�ߒ�#`1��D�-�R�Z߽�(�^�G�k��ϣ��5��ݻne�%
רu&����r�������RXQr���o����r�G&�P�B ��S�� s��k��cgִ{͖8��5�M�4M�dR�o�;������Q.�0Wj��~�A1Ԃ0��<I�E��T;F���#�����ܬ�yY!\�dk*8�k��pm���ݸ:����7��@���&�8R����Y�"��Ң�X[��+Ok]�pmc�]q=�ra�������F��H^n���l"l���cǖ]����6�	^iWMPb6ȵ����h3�����9؇3��;��Z8�\0����L���*Ժ3���Up�S���Xz
�z�P���z\�z_�QV��P��Ή��N�-(4�B;ߣ���k�[�a�0�%��«1/3��,C�n����ٟO����m
�j@ϭo���+��XHClx!��Է�-.���q\rޣ�\;複�f�d7z����/��
&#\H r7���	k�?u]�� ^>��wy���˝B�z/����6[Tğ-���A����k�o�H�.���|X�X1⛽F��5I�O'ҡ5-�>��J;Zc�
�\_
N���~���}�a�PMw���*��<,��O.��IҷxS�p�>���~_s�x�Vܢ���O�<?�����s���z'<Y�DM�����JEۯw���F�����Foq��N����Œ��L���`�r=��Wi���#��E�#�fL@��EX���/,1ϷMۯ(�/��ֻk�*}+u�5�doaR�vƇ=��>7h�)��'z�N={���¸�� �g���(0      �   
   x���          �     x��T��1��W��.Ed��!�U�",	����$�<��G���PR�����\k��i��ǹ�����j�~M˻�;���Y5u6e��
���$�x���bE���߲�ƛH�SoR �F�az~�z��_�+@.y�L�h�L���+�6цV�8�g�_z劍�8Q�/*[�O�����bK�n8y�����zbGz8�.��M�����(&�`r[0�Qב
>����������5���@�@�`�&�Rd� t"�Qh�<�����q�<7"����sbg��s�4�������m����6Z���x�O���8�Pס�:p
�s��i/d���1ї�k] X#���Av!�P�v���5�؋<C�h���P�
\"�5�q^�������6�,%c�}'�e�H���[��Ȣ����SA�Xh�q�H+�����4h@#BD>�!�F�iUR�Y���ɡ>`F����=��գ�v������8מ���@`Q��Ln�ya��X�H�T}:�%G���@T����0�I      �   �   x���v
Q���W((M��L���,.I�/.-.�,)-�/Vs�	uV�0�QP�IM�HU�Q()*Mմ��$A�P{XjzjIbNj1yF�p+*-I$S�	P@b���sjQ*�@SJ��,J.��r܋���4�h�sbQ�~3��_��7.. �r�?      �   �   x���_�0���{���6ۦ�$a �Ae�a�1�����E�"���>��9?���Ã�?"?<�P�^T�,Uu��yٴE�Nny4[-�1���mj�0]1�x���&�s�6��8�|��uE�'gF�QcV?�O[GG��|E���xW�[ԕR��V��v�(�ӫ(*�4N�1 V�0
�?�s �	���QkX�n���Q3i�����^o�9      �   �   x�����0��ŻY��Zt�� t��\����]���ѡ�����}ҬL�
Ҭ����}KwՍ�5\�5&uR�&t���A1��������Q��d5!�c��S+q�3��-9β�fv��l�`�f����J�DEz�D?1��6J֭�r�֐� �<�T�Y+,�k.L�      �   P   x���v
Q���W((M��L��M�+�/N�M�K�Qs�	uV�0�QP720��50�5�TG�y~�>>:
��\\\ ��      �   �  x�͒ώ�0��<�o�IC������T�m�$n�]���@�\}��X�,���J=��J��|3��g����v�����`�����l�.�f+�j4 ��/�� �[R�Όŀ�
|m�U&�������l�d&,%�ָ6��@�j�A�_�E��ru˻��U#O8��I6B��d�����y��q��18�.�>�L��q}����+�����߿	��p�/ǟ>�%GJ) �&�W?O�?`1/(�P}t�
wW#��疸� ��C(0Dw�J\�ǫ�4�>5s�x�
��Q�ΓO�$����RV$,�����c�8$G�+F8q-\�*�*�D6�3�j�S��K�[]��v��z_�Q��q�G�� G��'ޫ��ה��&��j��`���z���l���<J���i<%����K�1�`���fb��tN�z�M`�7¹|�oO�]-���[�Ͽ4��US�{�vq���I� �l��4L�����~ pcC      �   O  x����N�0��y�sDFh]���8�3a�[r�
T��.1���^���k�/LL���O���|Q��DI� �z]H>�#������q�B��K)c,d���;�;�e%��V��B�gX�q*A�Փrr�62�#���!F��ᨥ��{���>P2
(X�Ԓ�8nn���V����-QC��6Y#G=7��%68U��㛕ܧd�V�.n�ۿ�D�:��K2���*s|w"ۺ��ԩ��̚���S~� ���\�d�f Fp���r����Qk�`Y��bs��M�cQH�Up}��C�zx���)=�3��]��O`��1�N��b�k      �   �   x���=
�@���b�(���V�$���/�˲����	荼�m.����b�����B\Jdyy�*���@�׽T���t�҃����ri,´l;n��=0\��w0jd���ӻ&6�GFZ�ז���.���n���qW^�z���FZg��a�&�-:E�      �   
   x���          �   
   x���          �   �   x���K
�0�}O1�(���U��BۺOӡ�II��<�3U�KV�y|ß���kEY_`z�ɕA�GT���Z�%�I+Xlb`g-:�,���|y�����r��#��#;� f�e�8T�^O���hzai��P�C�lA���C㟑 �?��~us���'�y�1)���Ď�      �   =  x����J�@F�}�"K��̝�W.�H[ݖ��VZ}�|d����a�~�ۼ��~���~��i����q�Χ�eΟ��Co��0O��c�������7�^�ۇ����exd&ÐeDd$	YFFF+�EFW�`�%Z�sBXf���2�Ǥ�\]�zuY�͵B:�te���Jn,|_r���56|�!�|oB�8Qk�'!�Y��b�RZ)�|�	a������'��?�[�B��<���[�BXn!��¥d),��
��ue�õDin愰͚�	BXnfBXn�b�R���e!,7k�<�|�hӟRU���2z      �   �  x���ˊ%7�������u���*�Y44����I`��G��T���^	�k�.�$�����|ڞ_?�����o~����|���_ۯ?�|��q��o�~�1AyJ�ǖRchR��,���������`AM�a���� ��n�A���a��5����Ǫ��_a�#,��������(ǰe����F��a-�b��pX����(MX�J��#��+��⃐��r0��l@�k�9
eCl�����=�ZKsF����q�F���᭽��:B�#�٢����4s���q�ȓ�츼7.SOs�V�`9��\h���jk�q4Z����D`1s����� h$Wsm�c\��`����fPmh�`��al�M�@��N��1�u�r�e�?�؝�Z�H��lU�	Z� �Â��8��H�����//1?�O3B�?��`��4��(�4�r������]Vnt��}8ݤ	�%Lu6�R���+����+�)-'A%�W�)_��	�m�y��U0<]$�R�h��)�$D��N�y��f�x�X��-����f֖�`˓xp��۶�}6�Mް�Qv`�[��
3S�88�xp�d�v_�/�cۖY4�L�I�CP]�z0��5'0oI�"^n�O	���Ř�Jx�a�x }�����'W�=8���Ӳ8�`��.��|�VmX&	�f���Kύw�͖���9#U2��8'��qa%��)��KH�D�K�������ƧS�S=g(�X�]�Hr=���`�Z���rR��}6�e<(�2���qO+W��&�:|#\J�����P���W8�9C������9r;/��<�hڴ����M8���;^~;�Gǎ"�v��fmRKe�
�+��N\�����^>gĝ��3ƥ���9vv�if�18�3�w _�nq�A�@�X89O�q׏�?�ql֠xI���8��b����N��<�^������#�=�->xIqܧ]�;��Qy{Q<���2z�t�Y�Ƶ�l�����w8�w�^�Z	�3cߑ��Rx�b�|��Ǆ��S�!�J����t8�s��z	�s*�0S��87�{�>�ԕ��e&�`�x����jE�������[{|$������ŦWto>����;��jS�X3��Ɂs�n �!�
�k�!v�9q��x���`�݃�������W�w�	�,      �   u  x����N�0�����&��&�ī���`)�x[۪-](,�����2�-18�!������)�D� G�l�'�م�{0LQμ� �a��p��x����:@X@A�H@��	AvSBE��d�g�Q���ˡ�:rm2����s�-��T��oz�W�S}�u�@r�*�k�=��Ҟ�T3u���<Ђ)�/�c�����>�|�6���P�L���bm����L4�M>���:LZ;Ċ
m)��*!N�ǵ�)+�J��=3|[�\RhY��\wQx�#E�:�<�Y~"��R��@�=.���еT@��2�Lu�ܶ��0���m����h���G�GpEn�0&fw7Ƿ�C��} i��      �   
   x���          �   ^  x�ŕ�n�6����kD�ʒw��� wV:��ri0c˕E����oԋ^��b;$�DN�!6 �C��9��;g7��%��,ߣC{WY�֭4�F�^�W�zM�zE�E�Ŀ��h���Q�~��$Ip@(;�Hc��,m�s]�H�@D0�%�	.7���fX3�f���,�0���̄2n'�Z�>�Qg�62we���0/��m�e%ˢn$L�*X\���ac�)&� � �'c��8qº�^�p1{"a_SJs�Rؖ=�����	�}��X�!X��-���k������4=�����
���l��$o6C\����̪��
eN_\��������h��С[��� o�������C���c�o������$#��w�>}��Bm���B7�{)�<�J��,������q���J�]#��8�
�����m���ϛ�|����eY�T��U�/P��{�I�8bV�T<Jq��<Diad��+4����R~�j��~�	�Z:
xD�FY4��tk;W��A��Nk�JY��S����B6�qu�*/�¿�����ddD�(��ϲ�*ST�d���0���v�o�R����"����?�:Ds�&�� ���)�x|����C�۵�}�u�ҭI��he)Ί��>3��C��aʽ�-u/��^���LF^佫FK�[��+T+�6hZ��)6��HA�T����:� ���j�/����A�ê���;�1�@���LWg����f�:�P0�7��I�s��x��U���>>�zc�WF��M+T�(��z�VX޲z28b��u����液����e)������^ԝ��F�mǘ��B������?�=Y�      �   
   x���          �   �   x��н�1�~�b:Dt�:�J�EDEW��5r1Y���ociq���/���Jr����g&�b��3H�
�-)o�0w
a7�o��;�&�&_�Z�q���������#
�d��I�y��	u����Z[<�qe�0_	�%�c߻В4,� ���h�_~�y�s%�Q�| ���pP��՝�2a��"N���V7�נ��3͐v��-Q� b���      �   
   x���          �   
   x���         