 < ? p h p 
 
 n a m e s p a c e   A p p \ M o d e l s ; 
 
 u s e   I l l u m i n a t e \ D a t a b a s e \ E l o q u e n t \ F a c t o r i e s \ H a s F a c t o r y ; 
 u s e   I l l u m i n a t e \ D a t a b a s e \ E l o q u e n t \ M o d e l ; 
 
 c l a s s   P u b l i s h e r   e x t e n d s   M o d e l 
 { 
         u s e   H a s F a c t o r y ; 
 
         p u b l i c   f u n c t i o n   b o o k s ( ) 
         { 
                 r e t u r n   $ t h i s - > h a s M a n y ( ' A p p \ M o d e l s \ B o o k ' ,   ' p u b l i s h e r _ i d ' ) ; 
         } 
 
 }