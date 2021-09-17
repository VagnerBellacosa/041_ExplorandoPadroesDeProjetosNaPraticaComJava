using System;

public class MyClass
{
   private static MyClass instance;

   private MyClass() {}

   public static MyClass Instance
   {
      get
      {
         if (instance == null)
         {
            instance = new MyClass();
         }
         return instance;
      }
   }
}