using System;

namespace Exercice_1
{
    class Program
    {
        static void Main(string[] args)
        {
            bool rainy = true;
            if (rainy == true )
            {
                Console.WriteLine("Bonjour, il pleut aujourd'hui, vous devriez prendre votre parapluie");
            } else if (rainy == false)
            {
                Console.WriteLine("Bonjour, il ne pleut pas aujourd'hui, bonne journée");
            }
        }
    }
}
