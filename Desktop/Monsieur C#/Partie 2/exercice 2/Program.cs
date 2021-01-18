using System;

namespace exercice_2
{
    class Program
    {
        static void Main(string[] args)
        {

            Console.WriteLine("Quel âge avez-vous ?");
            string age = Console.ReadLine();
            int verifyAge;
            bool isNumber = Int32.TryParse(age, out verifyAge);
            if (isNumber)
            {
                if (verifyAge >= 18 && verifyAge <= 130)
                {
                    Console.WriteLine("Vous avez " + age + "ans, vous êtes donc majeur.e.");
                }
                else if (verifyAge < 18 && verifyAge > 0)
                {
                    Console.WriteLine("Vous avez " + age + "ans, vous êtes donc mineur.e.");
                }
                else
                {
                    Console.WriteLine("Ce n'est pas possible.");
                }
            }
            else
            {
                Console.WriteLine("That's not a number you dunkey (Gordon Ramsey).");
            }

        }
    }
}
