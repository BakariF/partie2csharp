using System;

namespace exercice 2
{
    class Program
    {
        static void Main(string[] args)
        {
            Console.WriteLine("Choisissez un mois de l'année.");
            string month = Console.ReadLine();
            if ((month == "Mars") || (month == "Avril") || (month == "Mai"))
            {
                Console.WriteLine("La saison du mois saisi est le Printemps.");
            }
            else if ((month == "Juin") || (month == "Juillet") || (month == "Août"))
            {
                Console.WriteLine("La saison du mois saisi est l'Eté.");
            }
            else if ((month == "Septembre") || (month == "Octobre") || (month == "Novembre"))
            {
                Console.WriteLine("La saison du mois saisi est l'Automne.");
            }
            else if ((month == "Décembre") || (month == "Janvier") || (month == "Février"))
            {
                Console.WriteLine("La saison du mois saisi est l'Hiver.");
            }
            else
            {
                Console.WriteLine("Le mois saisi est inconnu ou mal orthographié.");
            }
        }
    }
}