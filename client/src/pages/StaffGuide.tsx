import { Card, CardContent } from "@/components/ui/card";
import { motion } from "framer-motion";

export default function StaffGuide() {
  return (
    <div className="max-w-3xl mx-auto space-y-8">
      <motion.div
        initial={{ opacity: 0, y: 20 }}
        animate={{ opacity: 1, y: 0 }}
        className="text-center"
      >
        <h1 className="text-3xl sm:text-4xl font-bold mb-4">Staff Guide</h1>
        <p className="text-muted-foreground">
          Interested in joining the team? Here's everything you need to know.
        </p>
      </motion.div>

      <div className="grid gap-4 sm:gap-6">
        <Card>
          <CardContent className="p-4 sm:p-6">
            <h2 className="text-xl sm:text-2xl font-semibold mb-4">Requirements</h2>
            <ul className="list-disc list-inside space-y-2 text-muted-foreground">
              <li>Must be at least 16 years old</li>
              <li>Active player on the server for at least 1 month</li>
              <li>No previous bans or serious warnings</li>
              <li>Good communication skills and friendly attitude</li>
              <li>Available to moderate for at least 8 hours per week</li>
            </ul>
          </CardContent>
        </Card>

        <Card>
          <CardContent className="p-4 sm:p-6">
            <h2 className="text-xl sm:text-2xl font-semibold mb-4">Application Process</h2>
            <ol className="list-decimal list-inside space-y-2 text-muted-foreground">
              <li>Fill out the staff application form (coming soon)</li>
              <li>Undergo an interview with current staff members</li>
              <li>Complete a trial period (2 weeks)</li>
              <li>Receive final evaluation and decision</li>
            </ol>
          </CardContent>
        </Card>

        <Card>
          <CardContent className="p-4 sm:p-6">
            <h2 className="text-xl sm:text-2xl font-semibold mb-4">Staff Responsibilities</h2>
            <ul className="list-disc list-inside space-y-2 text-muted-foreground">
              <li>Moderate chat and maintain a friendly environment</li>
              <li>Help new players and answer questions</li>
              <li>Report and handle rule violations</li>
              <li>Participate in staff meetings</li>
              <li>Contribute to server improvement discussions</li>
            </ul>
          </CardContent>
        </Card>
      </div>
    </div>
  );
}
