using System;

namespace exercice_4
{
    class Program
    {
        static void Main(string[] args)
        {
            
            Console.WriteLine("login");
            string login = "arrête";
            Console.WriteLine("Mot de passe");
            string password = "bordel";

            switch (login)
            {
                case "bleu":
                    Console.WriteLine("login correct");
                    break;
                case "non":
                    Console.WriteLine("login incorrect");
            }
            switch (password)
            {
                case "bleubleu":
                    Console.WriteLine("mdp correct");
                    break;
                case "nonnon":
                    Console.WriteLine("mdp incorrect");
                    break;
            }
        }
    }
}
